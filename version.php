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
defined('MOODLE_INTERNAL') || die();

$plugin->version   = 2017051700;        // The current plugin version (Date: YYYYMMDDXX)
$plugin->requires  = 2016051900; 
$plugin->cron = 3600;       // Requires this Moodle version
$plugin->component = 'block_vozaccessibily'; // Full name of the plugin (used for diagnostics)
