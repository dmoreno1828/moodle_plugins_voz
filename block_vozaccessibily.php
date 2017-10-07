<?php
// This file is part of Duglas Moreno - http://duglasm.worpress.com
//
 
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This file contains the Voz modules block.
 *
 * @package    block_vozaccessibily
 * @copyright  2017 DUGLAS MORENO
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_vozaccessibily extends block_base {



function getBrowser($user_agent){
 
if(strpos($user_agent, 'MSIE') !== FALSE)
   return 'Internet explorer';
 elseif(strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
   return 'Microsoft Edge';
 elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
    return 'Internet explorer';
 elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
   return "Opera Mini";
 elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
   return "Opera";
 elseif(strpos($user_agent, 'Firefox') !== FALSE)
   return 'Mozilla Firefox';
 elseif(strpos($user_agent, 'Chrome') !== FALSE)
   return 'Google Chrome';
 elseif(strpos($user_agent, 'Safari') !== FALSE)
   return "Safari";
 else
   return 'No hemos podido detectar su navegador';
}

function version(){
 $browser=array("MSIE","EDGE","TRIDENT","OPERA","MOZILLA","NETSCAPE","FIREFOX","SAFARI","CHROME");
	$os=array("WIN","MAC","LINUX");
 
	# definimos unos valores por defecto para el navegador y el sistema operativo
	$info['browser'] = "OTHER"; 
foreach($browser as $parent)
	{
		$s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
		$f = $s + strlen($parent);
		$version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
		$version = preg_replace('/[^0-9,.]/','',$version);
		if ($s)
		{
			$info['browser'] = $parent;
			$info['version'] = $version;
		break;
		}
	}
	return $info;	
}

    function init() {
        $this->title = get_string('pluginname','block_vozaccessibily');
    }

    function has_config() {
        return true;
    }

    function get_content() {
 


        global $USER, $CFG, $DB, $OUTPUT,$PAGE;
		//$PAGE->requires->js( new moodle_url($CFG->wwwroot.'/blocks/vozaccessibily/jquery-1.10.2.js'));
		$PAGE->requires->js( new moodle_url($CFG->wwwroot.'/blocks/vozaccessibily/voz.js'));
		$PAGE->requires->js( new moodle_url($CFG->wwwroot.'/blocks/vozaccessibily/boostraps.js'));

		$PAGE->requires->css( new moodle_url($CFG->wwwroot.'/blocks/vozaccessibily/modal.css'));
 


        if ($this->content !== NULL) {
            return $this->content;
        }

        $this->content = new stdClass;
        $this->content->text = '';
        $this->content->footer = '';

        if (empty($this->instance)) {
            return $this->content;
        }
        $navegador=$this->version();
		 
		$modal=' <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        
          <h4 class="modal-title">Informaci&oacute;n</h4>
        </div>
        <div class="modal-body">
          <p class="texto">Para el mejor funcionamiento del completo, debes usar las versiones actualizadas del navegador. 
Mozilla Firefox mayor de la Versi&oacute;n 40; 
Chrome mayor de la Versi&oacute;n 30</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div> '; 
        $idUser = $USER->id;
	    $name_user=$USER->firstname." ".$USER->lastname;
		$this->content->text.="<div class='text'  style='text-align:justify;font-size:16px'>Bienvenidos ".$name_user." al Modulo de Accesibilidad</div>";
		$this->content->text.="<div class='text' style='text-align:justify;font-size:16px'  >Este complemento esta en versi&oacute;n de prueba, algunas funcionabilidades no estan completas.</div>";
	    $this->content->text.=$modal."<script>document.write('<input value=\"".$CFG->wwwroot."/blocks/vozaccessibily/\" id=\"home_dir\" type=\"hidden\">');</script>";
        return $this->content;
    }
}


