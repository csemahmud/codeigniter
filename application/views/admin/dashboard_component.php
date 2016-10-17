<?php
	/* Libchart - PHP chart library
	 * Copyright (C) 2005-2011 Jean-Marc Tr�meaux (jm.tremeaux at gmail.com)
	 * 
	 * This program is free software: you can redistribute it and/or modify
	 * it under the terms of the GNU General Public License as published by
	 * the Free Software Foundation, either version 3 of the License, or
	 * (at your option) any later version.
	 * 
	 * This program is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 * GNU General Public License for more details.
	 *
	 * You should have received a copy of the GNU General Public License
	 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
	 * 
	 */
	
	/**
	 * Pie chart demonstration
	 *
	 */

	include "application/third_party/libchart/classes/libchart.php";

	$chart = new PieChart();

	$dataSet = new XYDataSet();
        
        foreach($all_products as $v_product)
        {
            $dataSet->addPoint(new Point("$v_product->product_name ($v_product->product_quantity)", $v_product->product_quantity));
        }
	
	$chart->setDataSet($dataSet);

	$chart->setTitle("Poward By Mahmud cse.mahmudul@gmail.com");
	$chart->render("images/report/piechart.png");
?>			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="#">Dashboard</a>
					</li>
				</ul>
			</div>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-picture"></i>Welcome</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
                                            <h1>
                                                Hello,
                                                <span style="font-style: italic; font-family: cursive; color: #663399;">
                                                    <?php
                                                        if($this->session->userdata("admin_name") != NULL){
                                                            echo $this->session->userdata("admin_name");
                                                        }
                                                    ?>,
                                                </span>
                                                Welcome to Dashboard
                                            </h1>
                                            <figure>
                                                <img alt="Pie chart"  src="<?php echo base_url()?>images/report/piechart.png" style="border: 1px solid gray;"/>
                                                <figcaption>All Products Quantity Pie Chart</figcaption>
                                            </figure>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->