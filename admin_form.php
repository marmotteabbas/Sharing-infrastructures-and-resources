<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.


defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');
require_once($CFG->libdir.'/filelib.php');

class admin_form_h_infra_form extends moodleform {
    function definition() {

        global $CFG, $DB, $PAGE;
        $mform =& $this->_form;

        $filemanager_options = array();
        $filemanager_options['accepted_types'] = 'pdf';
        $filemanager_options['maxbytes'] = 0;
        $filemanager_options['maxfiles'] = -1;
        $filemanager_options['mainfile'] = true;

        $mform->addElement('filemanager', 'files', get_string('selectfiles'), null, $filemanager_options);

        $select = $mform->addElement('select', 'application_theme', 
        "Application theme(s)", 
        array('Energy' => 'Energy', 
        'Environment' => 'Environment', 
        'Health Engineering' => 'Health Engineering', 
        "Industry 4.0" => "Industry 4.0", 
        "IT, Electronics & Telecom" => "IT, Electronics & Telecom"), 
    /*$attributes*/ null);
        $select->setMultiple(false);

        $select = $mform->addElement('select', 'keywords', 
        "Keywords", 
        array('Characterisation' => 'Characterisation', 
        'Sustainable Technologies' => 'Sustainable Technologies', 
        'Multimedia' => 'Multimedia', 
        'Materials' => 'Materials', 
        "Animal Experimentation" => "Animal Experimentation", 
        "Optical" => "Optical",
        "Biological" => "Biological",
        "Helth, Miscellaneous" => "Helth, Miscellaneous",
        "Production 4.0" => "Production 4.0",
        "Energy Efficiency" => "Energy Efficiency",
        "Technological Applications for health" => "Technological Applications for health",
        "Robotics" => "Robotics",
        "Living Lab" => "Living Lab",
        "Design" => "Design",
        "Space" => "Space",
        "Renewable Energy" => "Renewable Energy",
        "Electromagnetic/Magnetic" => "Electromagnetic/Magnetic",
        "Artifical Intelligence" => "Artifical Intelligence",
        "Smart grids" => "Smart grids",
        "Electronics" => "Electronics",
        "Data processing" => "Data processing",
        "Electrical" => "Electrical",
        "Mechanical Engineering" => "Mechanical Engineering",
        "High Performance Computing" => "High Performance Computing",
        "Observation and/or modelling of nature" => "Observation and/or modelling of nature",
        "Micro-/-nano-" => "Micro-/-nano-",
        "Telecommunications" => "Telecommunications"), 
    /*$attributes*/ null);
        $select->setMultiple(true);

        $select = $mform->addElement('select', 'homepartnerinstitution', 
        "Home Partner Institution", 
        array(
        'Aalto University' => 'Aalto University', 
        'Grenoble INP – UGA' => 'Grenoble INP – UGA', 
        'KTH' => 'KTH', 
        "PoliTO" => "PoliTO", 
        "TUDa" => "TUDa", 
        "ULisboa" => "ULisboa",
        "UPC" => "UPC"), 
    /*$attributes*/ null);
        $select->setMultiple(false);

        $this->add_action_buttons(true, "Sauvez moi ça");
    }

    function set_id_context_field($i, $y){
        $this->_form->addElement('hidden', 'id_context', $i);
        $this->_form->addElement('hidden', 'instance_id', $y);
    }
}

