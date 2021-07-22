<?php 
                            $gravyalph = DB::query('SELECT * FROM food WHERE food_subcategory = "gravy" ORDER BY food_name');
                            foreach($gravyalph as $gravyalph_result){
                                echo '<div class="col-lg-4 col-sm-6 menubox"><div class="row"><p class="text-center"><img src=" ';
                                echo SITE_URL . "admin/" . $gravyalph_result['food_img'];
                                echo '" alt="" class="menu_img"></p></div><div class="row namerow"><h4 class="text-center">';
                                echo ucwords($gravyalph_result['food_name']);
                                echo '</h4></div><div class="row pricerow"><span class="text-center">';
                                echo "SGD" . $gravyalph_result['food_price'];
                                echo '</span></div><div class="row caloriesrow"><span class="text-center">';
                                echo $gravyalph_result['food_calories'] . "Cal";
                                echo '</span></div><div class="row addbuttonrow"><a class="addbutton text-center" data-id="'.$gravyalph_result['food_id'].'"><i class="bx bxs-cart-download"></i>Add</a></div></div>
                                ';
                            }
            
            ?>


<?php
            
            echo '<div class="row"><p class="text-center"><img src=" ';
                    echo SITE_URL . "admin/" . $gravy_result['food_img'];
                    echo '" alt="" class="menu_img"></p></div><div class="row namerow"><h4 class="text-center">';
                    echo ucwords($gravy_result['food_name']);
                    echo '</h4></div><div class="row pricerow"><span class="text-center">';
                    echo "SGD" . $gravy_result['food_price'];
                    echo '</span></div><div class="row caloriesrow"><span class="text-center">';
                    echo $gravy_result['food_calories'] . "Cal";
                    echo '</span></div><div class="row addbuttonrow"><a class="addbutton text-center" data-id="'.$gravy_result['food_id'].'"><i class="bx bxs-cart-download"></i>Add</a></div>';

            ?>



<div class="row">
                            <!-- <div class="col-12">
                                <h5>Address #1</h5>
                            </div> -->
                            <div class="col-12">
                                <p>fullName</p>
                            </div>
                            <div class="col-12">
                                <p>line1</p>
                            </div>
                            <div class="col-12">
                                <p>line2</p>
                            </div>
                            <div class="col-12">
                                <p>UnitNo</p>
                            </div>
                            <div class="row">
                                <div class="col-7">
                                    <p>Singapore 670237</p>
                                </div>
                                <div class="col-5">
                                    <button type="button" class="btn btn-primary btn-sm usethisaddress" id="usethisaddress" value="usethisaddress" data-id="" data-bs-toggle="modal" data-bs-target="" >Use This Address</button>
                                </div>

                            </div>
                        </div>
                        
                        <div class="row">
                            <!-- <div class="col-12">
                                <h5>Address #1</h5>
                            </div> -->
                            <div class="col-12">
                                <p>fullName</p>
                            </div>
                            <div class="col-12">
                                <p>line1</p>
                            </div>
                            <div class="col-12">
                                <p>line2</p>
                            </div>
                            <div class="col-12">
                                <p>UnitNo</p>
                            </div>
                            <div class="row">
                                <div class="col-7">
                                    <p>Singapore 670237</p>
                                </div>
                                <div class="col-5">
                                    <p><i>Default address</i></p>
                                </div>

                            </div>
                        </div>



                        var textnode = document.createTextNode("<?php 
                            $gravyalph = DB::query('SELECT * FROM food WHERE food_name = "braised soy gravy"');
                            foreach($gravyalph as $gravyalph_result){
                                echo '<div class="row"><p class="text-center"><img src=" ';
                                echo SITE_URL . "admin/" . $gravyalph_result['food_img'];
                                echo '" alt="" class="menu_img"></p></div><div class="row namerow"><h4 class="text-center">';
                                echo ucwords($gravyalph_result['food_name']);
                                echo '</h4></div><div class="row pricerow"><span class="text-center">';
                                echo "SGD" . $gravyalph_result['food_price'];
                                echo '</span></div><div class="row caloriesrow"><span class="text-center">';
                                echo $gravyalph_result['food_calories'] . "Cal";
                                echo '</span></div><div class="row addbuttonrow"><a class="addbutton text-center" data-id="'.$gravyalph_result['food_id'].'"><i class="bx bxs-cart-download"></i>Add</a></div>';
                            }
            
            // ?>
            ")
