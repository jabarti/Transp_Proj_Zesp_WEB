<?php
/**
 * Description of Obiekt
 *
 * @author Bartosz Lewiński
 * commit e5933246f001d0f4d742bc7e4f3ec581fc34d32d
 * Date:   Fri Mar 28 17:44:24 2014 +0100
 */


/**
 * Abstract base class for tables
 */
abstract class Obiekt {

    public $id;
    protected $fields = array();

    /**
     * @return string The table to manipulate in the database
     */
    abstract protected function table();

    /**
     * @return bool If it is possible to hide records or not
     */
    abstract public function hideable();

    /**
     * Find by id or other key fields
     * @param string $query
     * @return bool Load was ok
     */
    public function load($query) {
        return $this->_load($query);
    }
    
    /**
     * Find all records that matches this object
     * @returns array of objects with one object for each row found
     */
    public function loadAll($query) {
        return $this->_loadAll($query);
    }
    
    /**
     * Find by id or name
     * @return bool Load was ok
     */
    protected function _load($query) {
    	global $db;   //??
    	
        if (!$query) {
            trigger_error("No query set!", E_USER_ERROR);
            return false;
        }
        try {
          //echo "query: $query<br>";
        	$sth = $db->prepare($query);
        	//echo "<pre>sth: ";var_dump($sth);echo "</pre>";
        	//echo "<pre>sth->errorCode() ";var_dump($sth->errorCode());echo "</pre>";
        	//echo "<pre>sth->errorInfo() ";var_dump($sth->errorInfo());echo "</pre>";
        	//echo "<pre>db->errorCode() ";var_dump($db->errorCode());echo "</pre>";
        	//echo "<pre>db->errorInfo() ";var_dump($db->errorInfo);echo "</pre>";
        	$sth->execute();
          $this->set_from_row($sth->fetch(PDO::FETCH_ASSOC));
        	
//        	var_dump($db->query("SELECT 1"));
//        	echo "<pre>db->errorCode() ";var_dump($db->errorCode());echo "</pre>";
//        	echo "<pre>db->errorInfo() ";var_dump($db->errorInfo);echo "</pre>";
        }
        catch (PDOException $e) {
            trigger_error($e->getMessage(), E_USER_ERROR);
            return false;
        }
        return true;
    }

    /**
     * Set the properties of the object based
     * on a row from the database
     */
    protected function set_from_row($row) {
        $this->id = $row['id'];
        foreach ($this->fields as $field) {
            $this->$field = str_replace("&#63;","?",$row[$field]);
        }
    }


    /**
     * Set name to name to search for
     * @return array of objects with one object for each row found
     */
    protected function _loadAll($query) {
    	global $db;
    	
        if (!$query) {
            trigger_error("No query set!", E_USER_ERROR);
            return false;
        }
        $ret = array();
        try {
        	$sth = $db->prepare($query);
        	//echo "query: $query<br>";
             
        	$sth->execute();
	        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
	        	$obj = clone $this;
	        	$obj->set_from_row($row);
	        	$ret[] = $obj;
	        }
        }
        catch (PDOException $e) {
            trigger_error($e->getMessage(), E_USER_ERROR);
            return false;
        }
        
        $sth = null;
        
        return $ret;
    }

    /**
     * Save object as a row in the database table
     * @return bool Save was ok
     */
    public function save() {
    	return $this->_save();
    }

    /**
     * Save object as a row in the database table
     * @return bool Save was ok
     */
    public function _save() {
    	global $db;
        foreach ($this->fields as $field) {
          $set[] = $field . "='" . str_replace("?","&#63;",$this->$field) . "'";
        }
        $query = "INSERT INTO ";
        if ($this->id) {
            $query = "UPDATE ";
        }
        $query .= $this->table() . " SET " . join(',', $set);   // join is an alias for implode()
        if ($this->id) {
            $query .= " WHERE id=$this->id";
        }
        //print("$query<br>"); exit;
        try {
        	$sth = $db->prepare($query);
        	if (!$sth) {
        		print_r($db->errorInfo());
        		return false;
        	}
        	$sth->execute();
	        if (!$this->id) {
	            $this->id = $db->lastInsertId();
	        }
        }
        catch (PDOException $e) {
            trigger_error($e->getMessage(), E_USER_ERROR);
            return false;
        }
        return true;
    }

    /**
     * Delete row from database
     * @param force bool Force a hard delete instead of just a hide
     * @return bool Delete was ok
     */
    public function delete($force=false) {
    	global $db;
    	
        if (!$this->id) {
            trigger_error("Cannot delete, no id is set", E_USER_ERROR);
            return false;
        }

        if (!$force && $this->hideable()) {
            $query = "UPDATE " . $this->table() . " SET hide=1 WHERE id=$this->id";
        }
        else {
            $query = "DELETE FROM " . $this->table() . " WHERE id=$this->id";
        }
        //echo "query: $query<br>";
        try {
        	$sth = $db->prepare($query);
        	$sth->execute();
        }
        catch (PDOException $e) {
            trigger_error($e->getMessage(), E_USER_ERROR);
            return false;
        }
        return true;
    }
}
?>