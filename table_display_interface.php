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


require_once(__DIR__.'/../../config.php');
global $DB;
echo "<link href='style/style.css' rel='stylesheet' type='text/css' />";

$title = "Sharing infrastructures and resources";

$PAGE->set_pagelayout('report');
$PAGE->set_url('/blocks/h_infra_rsc/table_display_interface.php', array());

$instance = $DB->get_record('block_instances', array('id' => $_GET['instance_id']));
$categorycontext = context::instance_by_id($instance->parentcontextid);
$addpermission = has_capability('moodle/question:add', $categorycontext);

$PAGE->requires->js_call_amd('block_h_infra_rsc/table_manager', 'init', array("permission" => $addpermission));

$PAGE->set_heading($title);

echo "
<style>
.cellule_research {
    background-color:#4472c4;
    color: white;
    border-radius: 3px;
    text-align: center;
    font-size : 0.9em;
    cursor: pointer;
}

#table_filter_research_app_theme_filter {
    border-spacing: 2px 1px;
    border-collapse: unset;
}

.thead_filter_research_app_theme_filter, .thead_institution_filter {
    text-align: center;
    font-weight: bold;
    color:#4472c4;
}

.thead_filter_research_app_theme_filter {
    margin-left: 4%;
}

.thead_institution_filter {
    margin-left: 21%;
}

#research_app_theme_filter {
    border: solid 1px #4472c4;
    border-radius: 4px;
    display: inline-block;
    width:269px;
}

#research_keyword, #research_institution_filter {
    display: inline-block;
    border: solid 1px #4472c4;
    border-radius: 4px;
}

#table_keyword, #table_institution_filter {
    border-spacing: 2px 1px;
    border-collapse: unset;
}

.thead_keyword_filter {
    font-weight: bold;
    color:#4472c4;
    position: relative;
    text-align: center;
}

.cellule_keyword {
    font-size: 0.8em;
}
</style>
";
echo $OUTPUT->header();

   // echo html_writer::start_span() . '<h1>H2020</h1>' . html_writer::end_span();

        //Keywords filter
        echo html_writer::start_tag('div', array('id' => 'research_keyword'));
        echo html_writer::start_div('thead_keyword_filter')."Keywords Filter". html_writer::end_div();
            echo html_writer::start_tag('table', array("id" => "table_keyword"));
                echo html_writer::start_tag('tr');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Characterisation";
                    echo html_writer::end_tag('td');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Sustainable Technologies";
                    echo html_writer::end_tag('td');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Multimedia";
                    echo html_writer::end_tag('td');
                echo html_writer::end_tag('tr');
    
                echo html_writer::start_tag('tr');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Materials";
                    echo html_writer::end_tag('td');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Animal Experimentation";
                    echo html_writer::end_tag('td');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Optical";
                    echo html_writer::end_tag('td');
                echo html_writer::end_tag('tr');
    
                echo html_writer::start_tag('tr');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Biological";
                    echo html_writer::end_tag('td');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Helth, miscellaneous";
                    echo html_writer::end_tag('td');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Production 4.0";
                    echo html_writer::end_tag('td');
                echo html_writer::end_tag('tr');
    
                echo html_writer::start_tag('tr');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Energy Efficiency";
                    echo html_writer::end_tag('td');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Technological applications for Health";
                    echo html_writer::end_tag('td');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Robotics";
                    echo html_writer::end_tag('td');
                echo html_writer::end_tag('tr');
    
                echo html_writer::start_tag('tr');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Living Lab";
                    echo html_writer::end_tag('td');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Design";
                    echo html_writer::end_tag('td');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Space";
                    echo html_writer::end_tag('td');
                echo html_writer::end_tag('tr');
    
                echo html_writer::start_tag('tr');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Renewable Energy";
                    echo html_writer::end_tag('td');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Electromagnetic/Magnetic";
                    echo html_writer::end_tag('td');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Artifical Intelligence";
                    echo html_writer::end_tag('td');
                echo html_writer::end_tag('tr');
    
                echo html_writer::start_tag('tr');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Smart Grids";
                    echo html_writer::end_tag('td');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Electronics";
                    echo html_writer::end_tag('td');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Data processing";
                    echo html_writer::end_tag('td');
                echo html_writer::end_tag('tr');
    
                echo html_writer::start_tag('tr');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Electrical";
                    echo html_writer::end_tag('td');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Mechanical Engineering";
                    echo html_writer::end_tag('td');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "High Performance Computing";
                    echo html_writer::end_tag('td');
                echo html_writer::end_tag('tr');
    
                echo html_writer::start_tag('tr');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Observation and/or Modelling of Nature";
                    echo html_writer::end_tag('td');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Micro-/-nano-";
                    echo html_writer::end_tag('td');
                    echo html_writer::start_tag('td', array("box"=>"Keywords", "class" => "cellule_keyword cellule_research"));
                        echo "Telecommunications";
                    echo html_writer::end_tag('td');
                echo html_writer::end_tag('tr');
            echo html_writer::end_tag('table');
        echo html_writer::end_tag('div');
    
    
    //Research filter 1
    echo html_writer::start_tag('div', array('id' => 'research_app_theme_filter'));
    echo html_writer::start_span('thead_filter_research_app_theme_filter')."Research application themes filters". html_writer::end_span();
        echo html_writer::start_tag('table', array("id" => "table_filter_research_app_theme_filter"));
            echo html_writer::start_tag('tbody');
                echo html_writer::start_tag('tr');
                        echo html_writer::start_tag('td', array("box"=>"applicationthemes", "class" => "cellule_research cellule_applicationthemes"));
                            echo "Energy";
                        echo html_writer::end_tag('td');
                        echo html_writer::start_tag('td', array("box"=>"applicationthemes", "class" => "cellule_research cellule_applicationthemes"));
                        echo "Environment";
                        echo html_writer::end_tag('td');
                echo html_writer::end_tag('tr');
                echo html_writer::start_tag('tr');
                        echo html_writer::start_tag('td', array("box"=>"applicationthemes", "class" => "cellule_research cellule_applicationthemes"));
                            echo "Health Engineering";
                        echo html_writer::end_tag('td');
                        echo html_writer::start_tag('td', array("box"=>"applicationthemes", "class" => "cellule_research cellule_applicationthemes"));
                        echo "Industry 4.0";
                        echo html_writer::end_tag('td');
                echo html_writer::end_tag('tr');
                echo html_writer::start_tag('tr');
                        echo html_writer::start_tag('td', array("box"=>"applicationthemes", "class" => "cellule_research cellule_applicationthemes"));
                            echo "IT, Electronics & Telecom";
                        echo html_writer::end_tag('td');
                        echo html_writer::start_tag('td');
                        //nada
                        echo html_writer::end_tag('td');
                echo html_writer::end_tag('tr');
            echo html_writer::end_tag('tbody');
        echo html_writer::end_tag('table');
    echo html_writer::end_tag('div');

        //Institution filter
        echo html_writer::start_tag('div', array('id' => 'research_institution_filter'));
        echo html_writer::start_span('thead_institution_filter')."Home partner institution". html_writer::end_span();
            echo html_writer::start_tag('table', array("id" => "table_institution_filter"));
                echo html_writer::start_tag('tbody');
                    echo html_writer::start_tag('tr');
                        echo html_writer::start_tag('td', array("box"=>"institution", "class" => "cellule_research cellule_homepartnerinstitution"));
                            echo "Aalto University";
                        echo html_writer::end_tag('td');
                        echo html_writer::start_tag('td', array("box"=>"institution", "class" => "cellule_research cellule_homepartnerinstitution"));
                             echo "TUDa";
                        echo html_writer::end_tag('td');
                        echo html_writer::end_tag('tr');
                        echo html_writer::start_tag('tr');
                            echo html_writer::start_tag('td', array("box"=>"institution", "class" => "cellule_research cellule_homepartnerinstitution"));
                                echo "UPC";
                            echo html_writer::end_tag('td');
                            echo html_writer::start_tag('td', array("box"=>"institution", "class" => "cellule_research cellule_homepartnerinstitution"));
                                echo "KTH";
                            echo html_writer::end_tag('td');
                        echo html_writer::end_tag('tr');
                        echo html_writer::start_tag('tr');
                            echo html_writer::start_tag('td', array("box"=>"institution", "class" => "cellule_research cellule_homepartnerinstitution"));
                                echo "ULisboa";
                            echo html_writer::end_tag('td');
                            echo html_writer::start_tag('td', array("box"=>"institution", "class" => "cellule_research cellule_homepartnerinstitution"));
                                echo "Grenoble INP – UGA";
                            echo html_writer::end_tag('td');
                        echo html_writer::end_tag('tr');
                    echo html_writer::end_tag('tbody');
            echo html_writer::end_tag('table');
        echo html_writer::end_tag('div');


    // Big Table
    echo html_writer::start_tag('table', array('class' => 'all_datas_infra_rsc', "style" => "margin-right:10px;width:100%;"));

        echo html_writer::start_tag('thead');
            echo html_writer::start_tag('tr');
                echo html_writer::start_tag('th');
                    echo "Research infrastructure (links to details)";
                echo html_writer::end_tag('th');
                echo html_writer::start_tag('th');
                    echo "Application theme(s)";
                echo html_writer::end_tag('th');
                echo html_writer::start_tag('th');
                    echo "Keywords";
                echo html_writer::end_tag('th');
                echo html_writer::start_tag('th');
                    echo "Home partner institution";
                echo html_writer::end_tag('th');
            echo html_writer::end_tag('tr');
        echo html_writer::end_tag('thead');

        echo html_writer::start_tag('tbody', array("id" => "table_data"));

        $rec_infra = $DB->get_records("h_infra_src");

        foreach ($rec_infra as $rec) {
            $url = $rec->researchinfrastructure;

            $i_slash=strrpos($url, '/')+1;
            $i_ext= strrpos($url, '.jpg')-$i_slash;
   
            echo html_writer::start_tag('tr');
                echo html_writer::start_tag('td'/*, array('colspan' => '2')*/);
                    echo "<a href='".$url."'>".substr($url, $i_slash, $i_ext)."</a>"; //  echo "data 1";
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td');
                    echo  $rec->applicationthemes;
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td');
                    echo  str_replace("<>", " - ", $rec->keywords);
                echo html_writer::end_tag('td');
                echo html_writer::start_tag('td');
                    echo  $rec->homepartnerinstitution;
                echo html_writer::end_tag('td');

                if ($addpermission) {
                    echo html_writer::start_tag('td');
                        echo '<span class="remove_rec" rec_id="'.$rec->id.'"><i class="icon fa fa-trash fa-fw " title="Supprimer" aria-label="Supprimer"></i></span>';
                    echo html_writer::end_tag('td');
                }
                
            echo html_writer::end_tag('tr');
        }

        echo html_writer::end_tag('tbody');

    echo html_writer::end_tag('table');

echo $OUTPUT->footer();