<div id="page-wrapper">
  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          User Management
        </h1>
          <ol class="breadcrumb">
            <li>
              <i class="fa fa-dashboard"></i>  <?php echo anchor('dashboard', 'Dashboard'); ?>
            </li>
            <li class="active">
               <i class="fa fa-bar-chart-o"></i> User Management
            </li>
          </ol>
        </div>
      </div>

      <div class="row">
         <div class="col-lg-12">
            <h2><p class = "col-xs-6 col-md-5">List of Users</p>
              <div class="col-md-2 col-md-offset-5 text-right">
                <?php
                  $button = array(
                    "id"    => "add",
                    "class"   => "btn btn-default btn-primary btn-xs",
                    "content" => "ADD USER",
                    "onClick" => "show_modal(this.id)"
                  );
                  echo form_button($button);
                ?>
              </div>         
            </h2> 
          </div>
        </div>
        <hr>



    <div class="well">

      <div class="table-responsive panel panel-default">

        <div class="panel-body">

          <div class="table-responsive">
            <?php   

              $table["table_open"] = "<table class='table table-striped table-hover' id='userTable'>";
              $this->table->set_template($table);
              
              $user_header = array("data" => "Name", "data-class" => "expand");
              $username_header = array("data" => "Username", "data-hide" => "phone,tablet");
              $date_header = array("data" => "Date Added", "data-hide" => "phone");
              $action_header = array("width" => "10%", "data-hide" => "phone");
              
              
              $this->table->set_heading($user_header, $username_header, $date_header, $action_header, $action_header);

              echo $this->table->generate($users);
            ?>
          </div>
        </div>
      </div>
    </div>
    
    <div class="modal fade" id="usermodal" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>





<script type="text/javascript">
  $(document).ready(function(){
    var responsiveHelper = undefined;
    var breakpointDefinition = {
      tablet: 1024,
      phone: 480
    };
    var tableElement = $('#userTable');

    tableElement.dataTable({
      aoColumnDefs : [{
        bSortable : false,
        aTargets : [3,4,5,6,7,8]
      }],
      autoWidth: false,
      preDrawCallback: function() {
        // Initialize the responsive datatables helper once.
        if(!responsiveHelper) {
          responsiveHelper = new ResponsiveDatatablesHelper(tableElement, breakpointDefinition);
        }
      },
      rowCallback: function(nRow) {
        responsiveHelper.createExpandIcon(nRow);
      },
      drawCallback: function(oSettings) {
        responsiveHelper.respond();
      }
    });
    
    $("#usermodal").on("hidden.bs.modal", function(e) {
      $(location).attr("href", "users");
    });

    
  });
  
  function modify_modal(title, body, footer) {
    $(".modal-title").html(title);
    $(".modal-body").html(body);
    $(".modal-footer").html(footer);
  }



  function show_modal(action, data, id) {
    id = id || -1;
    
    if(action == "add") {
      $.post("<?php echo base_url(); ?>/index.php/manage_users/manage_users_modal/"+id, function(data) {

        modify_modal("Add User", data, "<button type='button' id="+action+" class='btn btn-default btn-primary btn-xs submit-button'"+
                         "onClick='submit(this.id);' >Add</button>");
      });
    } else if(action == "delete") {
      modify_modal("Delete User", "Are you sure you want to delete user \""+data+"\"?",
             "<button type='button' id='"+id+"' class='btn btn-default btn-primary btn-xs submit-button'"+
             "onClick='delete_user(this.id);'>Delete</button>"+
             "<button type='button' class='btn btn-xs submit-button' onClick='$(\"#usermodal\").modal(\"hide\");' >"+
             "Cancel</button>");
    } else if(action == "notice") {
      var notice = JSON.parse(data);
      modify_modal(notice.title, notice.body,
             "<button type='button' class='btn btn-xs submit-button' onClick='$(\"#usermodal\").modal(\"hide\");' >"+
             "Dismiss</button>");
    } else {
      $.ajax({
        url: "<?php echo base_url(); ?>/index.php/manage_users/manage_users_modal/"+id,
        type: "POST",
        data: {
        },
        success: function(data) {
          console.log(data);
          modify_modal("Update Info", data, "<button type='button' id="+action+" class='btn btn-default btn-primary btn-xs submit-button'"+
                              "onClick='submit(this.id);' >Save</button>");
        }
      });
    }
    
    $("#usermodal").modal("show");
  }

  function submit(action) {
    var _username             = document.userform._username.value;
    var lastname              = document.userform.lastname.value;
    var firstname             = document.userform.firstname.value;
    var middlename            = document.userform.middlename.value;
    var _gender               = document.userform._gender.value;
    var contactnumber         = document.userform.contactnumber.value;
    var _address              = document.userform._address.value;


    var user_id                     = (action == "update") ? document.userform.user_id.value : "-1";
    var init_username               = (action == "update") ? document.userform.init_username.value : "";
    var init_last_name              = (action == "update") ? document.userform.init_last_name.value : "";
    var init_first_name             = (action == "update") ? document.userform.init_first_name.value : "";
    var init_middle_name            = (action == "update") ? document.userform.init_middle_name.value : "";
    var init_gender                 = (action == "update") ? document.userform.init_gender.value : "";
    var init_contact_number         = (action == "update") ? document.userform.init_contact_number.value : "";
    var init_address                = (action == "update") ? document.userform.init_address.value : "";

    $(".submit-button").addClass("disabled");
    $.ajax({
      url: "<?php echo base_url(); ?>/index.php/manage_users/manage_users_modal/"+user_id,
      type: "POST",
      data: {
        'id'                        : user_id,
        '_username'                 : _username,
        'lastname'                  : lastname,
        'firstname'                 : firstname,
        'middlename'                : middlename,
        '_gender'                   : _gender,
        'contactnumber'             : contactnumber,
        '_address'                  : _address,
        'init_username'             : init_username,
        'init_last_name'              : init_last_name,
        'init_first_name'             : init_first_name,
        'init_middle_name'            : init_middle_name,
        'init_gender'                 : init_gender,
        'init_contact_number'         : init_contact_number,
        'init_address'                : init_address,
        'submit'                    : action
      },
      success: function(data) {
        try {
          var json =  JSON.parse(data);
          
          if(json.response == "Success!" || json.response == "Failure!")
            show_modal("notice", data);
            window.setTimeout(function () {
               $("#usermodal").modal("hide");
               window.location.reload();
            }, 1000);
          
        } catch(e) {
          $(".submit-button").removeClass("disabled");
          $(".modal-body").html(data);
        }
      }
    });
  }
  
  function delete_user(id) {

    $.post("<?php echo base_url(); ?>/index.php/manage_users/delete_user/"+id, function(data) {
      show_modal("notice", data);
        window.setTimeout(function () {
          $("#usermodal").modal("hide");
            window.location.reload();
          }, 1000);
    });
  }
</script>

