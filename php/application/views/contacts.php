{{< layout }}

{{$ extra_inline_styles }}
    .contact{
      text-align: center;
    }
    #add{
      text-align: center;
    }
{{/ extra_inline_styles }}

{{$ extra_content}}
 <div class="content"> 
    <div class="contact"> <h1>List of Contacts</h1></br> </div> 

    <div class="col-lg-2"></div>
    <div class="col-lg-8">
 <div class="table-responsive">
  <table class ="table table-hover">
     <tr>
        <th>Contact Person</th>
        <th>Contact Number</th>
        <th>Email</th>
        <th>Organization</th>
      </tr>
  {{#contacts }}
    <tr>
      <td>{{contact_person}}</td>
      <td>{{contact_number}}</td>
      <td>{{email}}</td>
      <td>{{organization}}</td>
    </tr>
  {{/ contacts }}
  </table></div></div>
  <div class="col-lg-2"></div>
    </div>
  </div>
{{/ extra_content }}

{{/ layout }}