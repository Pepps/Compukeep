<?php
/*###############SANNIE#################*/
class Builds_model extends CI_Model {
	/*Here the current users id is beeing used to get the specific users saved builds*/
	public function Get_builds(){

		if ($this->session->userdata("logged_in")) {
			$id = $this->session->userdata("id");
			$query = $this->db->query("SELECT * FROM savedbuild WHERE userid_fk = $id LIMIT 5");
			$result = $query->result();
			
			return $result; /*The specific builds are then beeing sent to the header and the pop-up for My builds*/
		}

	}
	
	/*Here the specific build that the user clicked is beeing "queried"*/
	public function Get_spec_build(){
		$buildid = $this->input->post('contentVar'); /*The variable from the link in My Builds, containing the specific builds id*/
		$query = $this->db->query("SELECT * FROM savedbuild WHERE pcid = $buildid");
		$idresult = $query->result();
		
		$componentid = array(); /*Are going to conain all the components id:s*/
		$component = array(); /*Are going to conain all the components "designation", like chassi, motherboard etc*/
		$count = 0;

		/*Here each component-row from the database in the query is beeing checked and counted, the id of each row is beeing saved in an array*/
		foreach($idresult as $row){
			if(isset($idresult[0]->chassi_fk)){
				$componentid[] = $idresult[0]->chassi_fk;
				$count = $count + 1;
				$component[] = "chassi"; 
			}
			if(isset($idresult[0]->motherboard_fk)){
				$componentid[] = $idresult[0]->motherboard_fk;
				$count = $count + 1;
				$component[] = "motherboard"; 
			}
			if(isset($idresult[0]->processor_fk)){
				$componentid[] = $idresult[0]->processor_fk;
				$count = $count + 1;
				$component[] = "processor";
			}
			if(isset($idresult[0]->videocard_fk)){
				$componentid[] = $idresult[0]->videocard_fk;
				$count = $count + 1;
				$component[] = "videocard";
			}
			if(isset($idresult[0]->memory_fk)){
				$componentid[] = $idresult[0]->memory_fk;
				$count = $count + 1;
				$component[] = "memory";
			}
			if(isset($idresult[0]->hdd_fk)){
				$componentid[] = $idresult[0]->harddrive_fk;
				$count = $count + 1;
				$component[] = "harddrive";
			}
			if(isset($idresult[0]->powersuply_fk)){
				$componentid[] = $idresult[0]->powersuply_fk;
				$count = $count + 1;
				$component[] = "powersupply";
			}
		}
		
		/*Finally all the checked component-id:s and designations are beeing used to get all the specific components*/
		$compresult = array();
		for($i=0; $i<$count; $i++){
			$query = $this->db->query("SELECT name, info FROM $component[$i] WHERE $componentid[$i] = id");
			array_push($compresult, $query->result());
		}

		/*The final result is then beeing styled and sent to the My builds pop-up*/
		$finalresult = "";
		for($i=0; $i<$count; $i++){
			foreach($compresult[$i] as $row)
				$finalresult = $finalresult . "<br/><div class='components'>" . $row->name . "</div><br/> <div class='info'>" . $row->info . "</div><br/>";
		}
		return $finalresult;
	}
}
/*###############SANNIE#################*/