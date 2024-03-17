<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['username'])){


  header('location:admin_login.php');
  

}
include 'php/auto.php';
  
include 'includes/head.php';
?>


<body class="nav-md">
  <?php include "includes/nav.php" ?>
  <?php include "includes/code.php" ?>
  <!-- /top navigation -->


  <?php
   if(isset($_GET['add-category'])){
?>
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">



      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
          <div class="x_panel">
            <div class="x_title">
              <h2>Add Category</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form method="post" enctype="multipart/form-data" action="" id="demo-form2" data-parsley-validate
                class="form-horizontal form-label-left">

                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name Of Category<span
                      class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input type="text" name="category_name" value="" required="required" class="form-control ">
                  </div>
                </div>
                <!---THumbnail Images--->
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="file"><b
                      style="color:#000000;">Thumbnail Image</b><span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 ">
                    <input type="file" name="img" id="file" class="form-control" required>
                  </div>
                </div>


                <div class="ln_solid"></div>
                <div class="item form-group">
                  <div class="col-md-6 col-sm-6 offset-md-3">
                    <button onclick="history.back()" class="btn btn-primary" type="button">Cancel</button>
                    <button class="btn btn-primary" type="reset">Reset</button>
                    <button type="submit" name="add_category" class="btn btn-success">Submit</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      <?php
	 }elseif(isset($_GET['add-subcategory'])){
		?>
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">



          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Add Sub Category</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form method="post" enctype="multipart/form-data" action="" id="demo-form2" data-parsley-validate
                    class="form-horizontal form-label-left">



                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Select Category<span
                          class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <select name="cat_id" class="form-select" aria-label="Default select example">
                          <?php
                            $d_querry = "select * from category";
                            $querry= mysqli_query($con,$d_querry);
                            $d_nums = mysqli_num_rows($querry);

                            while($dept= mysqli_fetch_array($querry))
                            {
                                ?>
                          <option value="<?php echo $dept['cat_id']; ?>"><?php echo $dept['cat_name']; ?></option>

                          <?php
                            }



                            ?>
                        </select>
                      </div>
                    </div>



                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Name Of Sub Category<span
                          class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="text" name="s_name" value="" required="required" class="form-control ">
                      </div>
                    </div>
                    <!---THumbnail Images--->
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="file"><b
                          style="color:#000000;">Thumbnail Image</b><span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="file" name="image" id="file" class="form-control" required>
                      </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="item form-group">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        <button onclick="history.back()" class="btn btn-primary" type="button">Cancel</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" name="add_Sub_categoryBtn" class="btn btn-success">Submit</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
          <?php

	 }elseif(isset($_GET['add-product'])){
		?>

          <style>
          #container {
            width: 100%;
            margin: 20px auto;

          }

          .ck-editor__editable[role="textbox"] {
            /* editing area */
            height: 500px;
          }

          .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
          }
          </style>
          <!-- /top navigation -->



          <!-- page content -->
          <div class="right_col" role="main">
            <div class="">
              <div class="page-title">



              </div>
              <div class="clearfix"></div>
              <div class="row">
                <div class="col-md-12 col-sm-12 ">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Add New Product</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br />
                      <form method="post" action="" enctype="multipart/form-data" id="demo-form2" data-parsley-validate
                        class="form-horizontal form-label-left">

                        <input type="hidden" name="author" value="<?php echo  $_SESSION['username']; ?>">

                        <div style="margin:30px 170px;">
                          <b style="color:#9D0707;">"&#9733;" চিহ্নিত ফিল্ডগুলো অবশ্যই পূরণ করতে হবে</b>


                        </div>
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="name"><b
                              style="color:#000000;">Product Name</b><span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="name" value="" required="required" class="form-control ">
                          </div>
                        </div>




                        <!-- CKE EDITOr -->
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile"><b
                            style="color:#000000;">Product Information</b><span class="required">*</span>
                        </label> <br>

                        <div id="container">
                          <textarea name="information" id="editor"></textarea>
                        </div>


                        <br>



                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile"><b
                              style="color:#000000;">Key Features</b><span class="required"> (Optional)</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" rows="8" cols="60" name="description" Placeholder="Use <br> tag end of the line for break line.
Ex- Hello world <br>
       Hello World 2 <br>"></textarea>
                          </div>
                        </div>


                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile"><b
                              style="color:#000000;">Category
                            </b><span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <select name="category" class="form-control" required>
                              <option value="">--Select Category--</option>

                              <?php
            include 'dbcon.php' ;
            $ret=mysqli_query($con,"select * from category");
            while ($row=mysqli_fetch_array($ret)) 
            {
             
            
            ?>
                              <option value="<?php echo htmlentities($row['cat_id']);?>">
                                <?php echo htmlentities($row['cat_name']);?></option>
                              <?php } ?>

                            </select>
                          </div>

                        </div>


                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile"><b
                              style="color:#000000;">Sub Category
                            </b><span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <select name="sub_category" class="form-control" required>
                              <option value="">--Select Sub Category--</option>

                              <?php
            include 'dbcon.php' ;
            $ret=mysqli_query($con,"select * from sub_category");
            while ($row=mysqli_fetch_array($ret)) 
            {
             
            
            ?>
                              <option value="<?php echo htmlentities($row['s_id']);?>">
                                <?php echo htmlentities($row['s_name']);?></option>
                              <?php } ?>

                            </select>
                          </div>

                        </div>


                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="name"><b
                              style="color:#000000;">Original Price</b><span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="number" name="original_price" value="" required="required"
                              class="form-control ">
                          </div>
                        </div>

                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="name"><b
                              style="color:#000000;">Product Price</b><span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="number" name="price" value="" required="required" class="form-control ">
                          </div>
                        </div>

                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="name"><b
                              style="color:#000000;">Shipping Charge</b><span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="number" name="shipping_charge" value="" required="required"
                              class="form-control ">
                          </div>
                        </div>











                        <!---THumbnail Images--->
                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="file"><b
                              style="color:#000000;">Thumbnail Image</b><span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="file" name="img" id="file" class="form-control" required>
                          </div>
                        </div>

                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="file"><b
                              style="color:#000000;">Image 1</b><span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="file" name="img1" id="file" class="form-control">
                          </div>
                        </div>

                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="file"><b
                              style="color:#000000;">Image 2</b><span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="file" name="img2" id="file" class="form-control">
                          </div>
                        </div>

                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="file"><b
                              style="color:#000000;">Image 3</b><span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="file" name="img3" id="file" class="form-control">
                          </div>
                        </div>

                        <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align" for="file"><b
                              style="color:#000000;">Image 4</b><span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 ">
                            <input type="file" name="img4" id="file" class="form-control">
                          </div>
                        </div>






                        <div class="ln_solid"></div>
                        <div class="item form-group">
                          <div class="col-md-6 col-sm-6 offset-md-3">
                            <button onclick="history.back()" class="btn btn-danger" type="button">Cancel</button>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" name="add_product" class="btn btn-success">Submit</button>
                          </div>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>
              </div>


              <!--
            The "super-build" of CKEditor&nbsp;5 served via CDN contains a large set of plugins and multiple editor types.
            See https://ckeditor.com/docs/ckeditor5/latest/installation/getting-started/quick-start.html#running-a-full-featured-editor-from-cdn
        -->
              <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/super-build/ckeditor.js"></script>
              <!--
            Uncomment to load the Spanish translation
            <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/super-build/translations/es.js"></script>
        -->
              <script>
              // This sample still does not showcase all CKEditor&nbsp;5 features (!)
              // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
              CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                  items: [
                    'exportPDF', 'exportWord', '|',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript',
                    'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed',
                    '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                  ],
                  shouldNotGroupWhenFull: true
                },
                // Changing the language of the interface requires loading the language file using the <script> tag.
                // language: 'es',
                list: {
                  properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                  }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                  options: [{
                      model: 'paragraph',
                      title: 'Paragraph',
                      class: 'ck-heading_paragraph'
                    },
                    {
                      model: 'heading1',
                      view: 'h1',
                      title: 'Heading 1',
                      class: 'ck-heading_heading1'
                    },
                    {
                      model: 'heading2',
                      view: 'h2',
                      title: 'Heading 2',
                      class: 'ck-heading_heading2'
                    },
                    {
                      model: 'heading3',
                      view: 'h3',
                      title: 'Heading 3',
                      class: 'ck-heading_heading3'
                    },
                    {
                      model: 'heading4',
                      view: 'h4',
                      title: 'Heading 4',
                      class: 'ck-heading_heading4'
                    },
                    {
                      model: 'heading5',
                      view: 'h5',
                      title: 'Heading 5',
                      class: 'ck-heading_heading5'
                    },
                    {
                      model: 'heading6',
                      view: 'h6',
                      title: 'Heading 6',
                      class: 'ck-heading_heading6'
                    }
                  ]
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                placeholder: 'Start',
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                fontFamily: {
                  options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                  ],
                  supportAllValues: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                  options: [10, 12, 14, 'default', 18, 20, 22],
                  supportAllValues: true
                },
                // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                  allow: [{
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                  }]
                },
                // Be careful with enabling previews
                // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                  showPreviews: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                link: {
                  decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                      mode: 'manual',
                      label: 'Downloadable',
                      attributes: {
                        download: 'file'
                      }
                    }
                  }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                mention: {
                  feeds: [{
                    marker: '@',
                    feed: [
                      '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate',
                      '@cookie', '@cotton', '@cream',
                      '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi',
                      '@ice', '@jelly-o',
                      '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame',
                      '@snaps', '@soufflé',
                      '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                  }]
                },
                // The "super-build" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                  // These two are commercial, but you can try them out without registering to a trial.
                  // 'ExportPdf',
                  // 'ExportWord',
                  'AIAssistant',
                  'CKBox',
                  'CKFinder',
                  'EasyImage',
                  // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                  // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                  // Storing images as Base64 is usually a very bad idea.
                  // Replace it on production website with other solutions:
                  // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                  // 'Base64UploadAdapter',
                  'RealTimeCollaborativeComments',
                  'RealTimeCollaborativeTrackChanges',
                  'RealTimeCollaborativeRevisionHistory',
                  'PresenceList',
                  'Comments',
                  'TrackChanges',
                  'TrackChangesData',
                  'RevisionHistory',
                  'Pagination',
                  'WProofreader',
                  // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                  // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                  'MathType',
                  // The following features are part of the Productivity Pack and require additional license.
                  'SlashCommand',
                  'Template',
                  'DocumentOutline',
                  'FormatPainter',
                  'TableOfContents',
                  'PasteFromOfficeEnhanced'
                ]
              });
              </script>


              <?php


	 }elseif(isset($_GET['add-coupon-code'])){
?>

              <!-- page content -->
              <div class="right_col" role="main">
                <div class="">
                  <div class="page-title">



                  </div>
                  <div class="clearfix"></div>
                  <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Add Coupon Code</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <br />
                          <form method="post" action="" id="demo-form2" data-parsley-validate
                            class="form-horizontal form-label-left">





                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Enter Coupon
                                Code<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="cupon_code" value="" required="required" class="form-control ">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Coupon Type<span
                                  class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <select name="cupon_type" class="form-control" required>
                                  <option value="" selected disabled>Select Coupon Type</option>
                                  <option value="Percent">Percent</option>
                                  <option value="Taka">Taka</option>

                                </select>
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Coupon
                                Discount<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="cupon_value" value="" required="required"
                                  class="form-control ">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Minimum Order
                                Amount<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="cupon_min_value" value="" required="required"
                                  class="form-control ">
                              </div>
                            </div>


                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Maximum Discount
                                Amount<span class="required"></span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="max_ammount" value="" class="form-control ">
                              </div>
                            </div>


                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Coupon Expire Time
                                (Must In seconds)<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="expired" value="" required="required" class="form-control ">
                              </div>
                            </div>


                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">No. Of Repeat
                                Usages<span class="required"></span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="repeat_use" value="1" placeholder="By default 1"
                                  class="form-control ">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">No. Of Users<span
                                  class="required"></span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="max_users" value="" class="form-control ">
                              </div>
                            </div>






                            <div class="ln_solid"></div>
                            <div class="item form-group">
                              <div class="col-md-6 col-sm-6 offset-md-3">
                                <button onclick="history.back()" class="btn btn-primary" type="button">Cancel</button>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" name="add_coupon" class="btn btn-success">Submit</button>
                              </div>
                            </div>

                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <?php


     }elseif(isset($_GET['add-Banner'])){
        ?>
                  <!-- page content -->
                  <div class="right_col" role="main">
                    <div class="">
                      <div class="page-title">



                      </div>
                      <div class="clearfix"></div>
                      <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                          <div class="x_panel">
                            <div class="x_title">
                              <h2>Add Images</h2>
                              <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                              </ul>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <br />
                              <form method="post" enctype="multipart/form-data" action="" id="demo-form2"
                                data-parsley-validate class="form-horizontal form-label-left">


                                <!---THumbnail Images--->
                                <div class="item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3 label-align" for="file"><b
                                      style="color:#000000;">Add Images</b><span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 ">
                                    <input type="file" name="images[]" id="file" class="form-control" multiple required>
                                  </div>
                                </div>


                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                  <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button onclick="history.back()" class="btn btn-primary"
                                      type="button">Cancel</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" name="upload_Banner" class="btn btn-success">Submit</button>
                                  </div>
                                </div>

                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
     }else{
		?>


                      <style>
                      * {
                        font-family: 'PT Sans Caption', sans-serif, 'arial', 'Times New Roman';
                      }

                      /* Error Page */
                      .error .clip .shadow {
                        height: 180px;
                        /*Contrall*/
                      }

                      .error .clip:nth-of-type(2) .shadow {
                        width: 130px;
                        /*Contrall play with javascript*/
                      }

                      .error .clip:nth-of-type(1) .shadow,
                      .error .clip:nth-of-type(3) .shadow {
                        width: 250px;
                        /*Contrall*/
                      }

                      .error .digit {
                        width: 150px;
                        /*Contrall*/
                        height: 150px;
                        /*Contrall*/
                        line-height: 150px;
                        /*Contrall*/
                        font-size: 120px;
                        font-weight: bold;
                      }

                      .error h2

                      /*Contrall*/
                        {
                        font-size: 32px;
                      }

                      .error .msg

                      /*Contrall*/
                        {
                        top: -190px;
                        left: 30%;
                        width: 80px;
                        height: 80px;
                        line-height: 80px;
                        font-size: 32px;
                      }

                      .error span.triangle

                      /*Contrall*/
                        {
                        top: 70%;
                        right: 0%;
                        border-left: 20px solid #535353;
                        border-top: 15px solid transparent;
                        border-bottom: 15px solid transparent;
                      }


                      .error .container-error-404 {
                        margin-top: 10%;
                        position: relative;
                        height: 250px;
                        padding-top: 40px;
                      }

                      .error .container-error-404 .clip {
                        display: inline-block;
                        transform: skew(-45deg);
                      }

                      .error .clip .shadow {

                        overflow: hidden;
                      }

                      .error .clip:nth-of-type(2) .shadow {
                        overflow: hidden;
                        position: relative;
                        box-shadow: inset 20px 0px 20px -15px rgba(150, 150, 150, 0.8), 20px 0px 20px -15px rgba(150, 150, 150, 0.8);
                      }

                      .error .clip:nth-of-type(3) .shadow:after,
                      .error .clip:nth-of-type(1) .shadow:after {
                        content: "";
                        position: absolute;
                        right: -8px;
                        bottom: 0px;
                        z-index: 9999;
                        height: 100%;
                        width: 10px;
                        background: linear-gradient(90deg, transparent, rgba(173, 173, 173, 0.8), transparent);
                        border-radius: 50%;
                      }

                      .error .clip:nth-of-type(3) .shadow:after {
                        left: -8px;
                      }

                      .error .digit {
                        position: relative;
                        top: 8%;
                        color: white;
                        background: #2E0963;
                        border-radius: 50%;
                        display: inline-block;
                        transform: skew(45deg);
                      }

                      .error .clip:nth-of-type(2) .digit {
                        left: -10%;
                      }

                      .error .clip:nth-of-type(1) .digit {
                        right: -20%;
                      }

                      .error .clip:nth-of-type(3) .digit {
                        left: -20%;
                      }

                      .error h2 {
                        color: #A2A2A2;
                        font-weight: bold;
                        padding-bottom: 20px;
                      }

                      .error .msg {
                        position: relative;
                        z-index: 9999;
                        display: block;
                        background: #535353;
                        color: #A2A2A2;
                        border-radius: 50%;
                        font-style: italic;
                      }

                      .error .triangle {
                        position: absolute;
                        z-index: 999;
                        transform: rotate(45deg);
                        content: "";
                        width: 0;
                        height: 0;
                      }

                      /* Error Page */
                      @media(max-width: 767px) {

                        /* Error Page */
                        .error .clip .shadow {
                          height: 100px;
                          /*Contrall*/
                        }

                        .error .clip:nth-of-type(2) .shadow {
                          width: 80px;
                          /*Contrall play with javascript*/
                        }

                        .error .clip:nth-of-type(1) .shadow,
                        .error .clip:nth-of-type(3) .shadow {
                          width: 100px;
                          /*Contrall*/
                        }

                        .error .digit {
                          width: 80px;
                          /*Contrall*/
                          height: 80px;
                          /*Contrall*/
                          line-height: 80px;
                          /*Contrall*/
                          font-size: 52px;
                        }

                        .error h2

                        /*Contrall*/
                          {
                          font-size: 24px;
                        }

                        .error .msg

                        /*Contrall*/
                          {
                          top: -110px;
                          left: 15%;
                          width: 40px;
                          height: 40px;
                          line-height: 40px;
                          font-size: 18px;
                        }

                        .error span.triangle

                        /*Contrall*/
                          {
                          top: 70%;
                          right: -3%;
                          border-left: 10px solid #535353;
                          border-top: 8px solid transparent;
                          border-bottom: 8px solid transparent;
                        }

                        .error .container-error-404 {
                          height: 150px;
                        }

                        /* Error Page */
                      }

                      /*--------------------------------------------Framework --------------------------------*/

                      .overlay {
                        position: relative;
                        z-index: 20;
                      }

                      /*done*/
                      .ground-color {
                        background: white;
                      }

                      /*done*/
                      .item-bg-color {
                        background: #EAEAEA
                      }

                      /*done*/

                      /* Padding Section*/
                      .padding-top {
                        padding-top: 10px;
                      }

                      /*done*/
                      .padding-bottom {
                        padding-bottom: 10px;
                      }

                      /*done*/
                      .padding-vertical {
                        padding-top: 10px;
                        padding-bottom: 10px;
                      }

                      .padding-horizontal {
                        padding-left: 10px;
                        padding-right: 10px;
                      }

                      .padding-all {
                        padding: 10px;
                      }

                      /*done*/

                      .no-padding-left {
                        padding-left: 0px;
                      }

                      /*done*/
                      .no-padding-right {
                        padding-right: 0px;
                      }

                      /*done*/
                      .no-vertical-padding {
                        padding-top: 0px;
                        padding-bottom: 0px;
                      }

                      .no-horizontal-padding {
                        padding-left: 0px;
                        padding-right: 0px;
                      }

                      .no-padding {
                        padding: 0px;
                      }

                      /*done*/
                      /* Padding Section*/

                      /* Margin section */
                      .margin-top {
                        margin-top: 10px;
                      }

                      /*done*/
                      .margin-bottom {
                        margin-bottom: 10px;
                      }

                      /*done*/
                      .margin-right {
                        margin-right: 10px;
                      }

                      /*done*/
                      .margin-left {
                        margin-left: 10px;
                      }

                      /*done*/
                      .margin-horizontal {
                        margin-left: 10px;
                        margin-right: 10px;
                      }

                      /*done*/
                      .margin-vertical {
                        margin-top: 10px;
                        margin-bottom: 10px;
                      }

                      /*done*/
                      .margin-all {
                        margin: 10px;
                      }

                      /*done*/
                      .no-margin {
                        margin: 0px;
                      }

                      /*done*/

                      .no-vertical-margin {
                        margin-top: 0px;
                        margin-bottom: 0px;
                      }

                      .no-horizontal-margin {
                        margin-left: 0px;
                        margin-right: 0px;
                      }

                      .inside-col-shrink {
                        margin: 0px 20px;
                      }

                      /*done - For the inside sections that has also Title section*/
                      /* Margin section */

                      hr {
                        margin: 0px;
                        padding: 0px;
                        border-top: 1px dashed #999;
                      }

                      /*--------------------------------------------FrameWork------------------------*/
                      </style>
                      <!-- page content -->
                      <div class="right_col" role="main">
                        <div class="">
                          <div class="page-title">



                          </div>
                          <div class="clearfix"></div>
                          <div class="row">
                            <div class="col-md-12 col-sm-12 ">
                              <div class="x_panel">

                                <div class="x_content">
                                  <br />
                                  <!-- Error Page -->
                                  <div class="error">
                                    <div class="container-floud">
                                      <div class="col-xs ground-color text-center">
                                        <div class="container-error-404">
                                          <div class="clip">
                                            <div class="shadow"><span class="digit thirdDigit"></span></div>
                                          </div>
                                          <div class="clip">
                                            <div class="shadow"><span class="digit secondDigit"></span></div>
                                          </div>
                                          <div class="clip">
                                            <div class="shadow"><span class="digit firstDigit"></span></div>
                                          </div>
                                          <div class="msg">OH!<span class="triangle"></span></div>
                                        </div>
                                        <h2 class="h1">Sorry! Page not found</h2>
                                        <button class="btn btn-dark" onclick="history.back()">Go Home</button>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Error Page -->
                                </div>
                              </div>
                            </div>
                          </div>

                          <script>
                          function randomNum() {
                            "use strict";
                            return Math.floor(Math.random() * 9) + 1;
                          }
                          var loop1, loop2, loop3, time = 30,
                            i = 0,
                            number, selector3 = document.querySelector('.thirdDigit'),
                            selector2 = document.querySelector('.secondDigit'),
                            selector1 = document.querySelector('.firstDigit');
                          loop3 = setInterval(function() {
                            "use strict";
                            if (i > 40) {
                              clearInterval(loop3);
                              selector3.textContent = 4;
                            } else {
                              selector3.textContent = randomNum();
                              i++;
                            }
                          }, time);
                          loop2 = setInterval(function() {
                            "use strict";
                            if (i > 80) {
                              clearInterval(loop2);
                              selector2.textContent = 0;
                            } else {
                              selector2.textContent = randomNum();
                              i++;
                            }
                          }, time);
                          loop1 = setInterval(function() {
                            "use strict";
                            if (i > 100) {
                              clearInterval(loop1);
                              selector1.textContent = 4;
                            } else {
                              selector1.textContent = randomNum();
                              i++;
                            }
                          }, time);
                          </script>
                          <?php
	 }


?>





                          <?php include "includes/footer.php"?>

</body>

</html>
<?php include 'includes/js.php'; ?>