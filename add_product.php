<?php
include('include/header.php');
include('include/left.php');
$temp_id = $_GET['id'];
if (isset($_GET['id']) && $_GET['id'] != '') {
    $query = "SELECT * FROM product WHERE ProID=" . $_GET['id'] . "";
    $row = $dbc->QueryGetRow($query);
}
?>
    <style type="text/css">
        .imagePreview {
            float: left;
            position: relative;
            margin-right: 20px;
        }

        .imagePreview a img{
            position: absolute;
            top: -6px;
            right: -6px;
        }
    </style>
    <div class="content-wrapper">
        <section class="content-header">
            PRoduct Details
        </section>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form role="form" id="property_form" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" class="form-control" name="product_name" id="product_name" value="<?php if($temp_id != '') { echo $row['ProName']; }?>">
                                    <input type="hidden" name="productid" id="productid" value="<?php if($temp_id != '') { echo $row['ProID']; }?>">
                                </div>

                                <div class="form-group">
                                    <label for="product_detail">Product Detail</label>
                                    <input type="text" class="form-control" name="product_detail" id="product_detail" value="<?php if($temp_id != '') { echo $row['ProDetail']; }?>" >
                                </div>
                                <div class="form-group">
                                    <label for="product_discription">Product Description</label>
                                    <input type="text" class="form-control" name="product_discription" id="product_discription" value="<?php if($temp_id != '') { echo $row['ProDes']; }?>">
                                </div>
                                <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <select class="form-control" name="category_name" id="category_name" >
                                        <option value="">Select</option>
                                        <?php
                                        $query="select * from category";
                                        $result=$dbc->Query($query);
                                        while ($row1=$result->fetch_assoc()){
                                            if ($row1['CategoryID'] == $row['CategoryID']){
                                                echo "<option value='" . $row1['CategoryID'] . "' selected>" . $row1['CategoryName'] . "</option>";
                                            }
                                            else {
                                                echo "<option value='" . $row1['CategoryID'] . "'>" . $row1['CategoryName'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sub_category_name">Sub Category Name</label>
                                    <select class="form-control" name="sub_category_name" id="sub_category_name" >
                                        <option value="">Select</option>
                                        <?php
                                        $query="select * from sub_category";
                                        $result=$dbc->Query($query);
                                        while ($row1=$result->fetch_assoc()){
                                            if ($row1['SubCateID'] == $row['SubCateID']){
                                                echo "<option value='" . $row1['SubCateID'] . "' selected>" . $row1['SubCateName'] . "</option>";
                                            }
                                            else {
                                                echo "<option value='" . $row1['SubCateID'] . "'>" . $row1['SubCateName'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="product_price">Product Price</label>
                                    <input type="number" class="form-control" name="product_price" id="product_price" value="<?php if($temp_id != '') { echo $row['ProPrice']; }?>" >
                                </div>
                                <div class="form-group">
                                    <label for="product_cop">Product CountOnPackege</label>
                                    <input type="number" class="form-control" name="product_cop" id="product_cop" value="<?php if($temp_id != '') { echo $row['NoOfCountOnPackage']; }?>"  >
                                </div>
                                <div class="form-group">
                                    <label for="product_volume">Product Volume</label>
                                    <select class="form-control" name="product_volume" id="product_volume"  >
                                        <option value="">Select</option>
                                        <?php
                                        $query="select * from product_volume";
                                        $result=$dbc->Query($query);
                                        while ($row1=$result->fetch_assoc()){
                                            if ($row1['ProVolID'] == $row['ProVolID']){
                                                echo "<option value='" . $row1['ProVolID'] . "' selected>" . $row1['ProValName'] . "</option>";
                                            }
                                            else {
                                                echo "<option value='" . $row1['ProVolID'] . "'>" . $row1['ProValName'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="product_numvolume">Number of Volume</label>
                                    <input type="number" class="form-control" name="product_numvolume" id="product_numvolume" value="<?php if($temp_id != '') { echo $row['NoOfValume']; }?>" >
                                </div>
                                <div class="form-group">
                                    <label for="uploadimage">Product Img1: </label>
                                    <input type="file" name="uploadimage" id="uploadimage"/>

                                </div>
                                <div class="form-group">
                                    <label for="uploadimage2">Product Img2: </label>
                                    <input type="file" name="uploadimage2" id="uploadimage2"/>
                                </div>
                                <div class="form-group">
                                    <label for="uploadimage3">Product Img3: </label>
                                    <input type="file" name="uploadimage3" id="uploadimage3"/>
                                </div>
                                <div class="form-group">
                                    <label for="uploadimage4">Product Img4: </label>
                                    <input type="file" name="uploadimage4" id="uploadimage4"/>
                                </div>
                                <div class="form-group">
                                    <label for="uploadimage5">Product Img5: </label>
                                    <input type="file" name="uploadimage5" id="uploadimage5"/>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                <a href="product.php" class="btn btn-primary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="uploadFile"> Product Image :</label>
                            </div>

                                    <div class="imagePreview">
                                        <img id="quepic" name="quepic" src="images/product/<?php echo $row['ProImg1']; ?>" alt="property floor plan image"
                                             height="120px" width="120px"/>
                                        <img id="av" name="ac" src="images/product/<?php echo $row['ProImg2']; ?>" alt="property floor plan image"
                                        height="120px" width="120px"/>
                                        <img id="av" name="ac" src="images/product/<?php echo $row['ProImg3']; ?>" alt="property floor plan image"
                                             height="120px" width="120px"/>
                                        <img id="av" name="ac" src="images/product/<?php echo $row['ProImg4']; ?>" alt="property floor plan image"
                                             height="120px" width="120px"/>
                                        <img id="av" name="ac" src="images/product/<?php echo $row['ThumbnailImg']; ?>" alt="property floor plan image"
                                             height="120px" width="120px"/>

                                    </div>
                          
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#property_form').validate({
                rules: {
                    product_name: {required: true},
                    product_detail: {required: true},
                    product_discription: {required: true},
                    category_name: {required: true},
                    product_price: {required: true},
                    product_cop: {required: true},
                    product_volume: {required: true},
                    product_numvolume: {required: true},
                },
                messages: {
                    product_name: {required: "product name required"},
                    product_detail: {required: "product detailrequired"},
                    product_discription: {required: "product discription required"},
                    category_name: {required: "category name required"},
                    product_price: {required: "product price required"},
                    product_cop: {required: "product Count on Packege required"},
                    product_volume: {required: "product volume required"},

                    product_numvolume: {required: "product number of volume required"},
                },
                submitHandler: function (form) {
                    var data = new FormData($('#property_form')[0]);
                    $.ajax({
                        type: 'post',
                        data: data,
                        dataType: "json",
                        url: "core/add_product.php",
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (r) {
                            if (r.status == 200) {
                                toastr.success(r.message, 'Success');
                                $("#property_form")[0].reset();
                            } else
                            {
                                toastr.error(r.message, 'Error');
                            }
                        },
                    });
                }
            });
        });


        function readURL(input) {
            var fileName = input.files[0].name;
            var Extension = fileName.split(".")[1].toUpperCase();
            if (input.files && input.files[0]) {
                if (Extension == "PNG" || Extension == "JPG")//check image type
                {
                    var reader = new FileReader();
                    reader.readAsDataURL(input.files[0]);
                    // ======================= check image height and width=========================
                    reader.onload = function (e) {
                        var imagepath = e.target.result;
                        var imgUpload = document.getElementById("icon");
                        var img = new Image();
                        img.onload = function ()
                        {
                            if (this.width != 500 || this.height != 300)
                            {
                                document.getElementById("uploadimage").value = "";
                                imgUpload.src = "noimage_72.png";
                                alert("The image you attempted to upload must be 300px X 500px");
                            }
                        };
                        img.src = imagepath;
                        imgUpload.src = imagepath;
                    };
                }//check file type end
                else {
                    $('#uploadimage').val('');
                    alert("File with " + fileName.split(".")[1] + " is invalid. Upload a validfile with png extensions");
                }
            }
        }



    </script>

<?php
include('include/footer.php');
?>