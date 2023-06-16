<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('public/images/newicon.ico')}}" type="image/ico" />
    <title>Editor Image List | BirthdayCards</title>
    @include('Admin.layout.datatable_css')   
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
      
      <!-- Sidebar -->
      @include('Admin.layout.sidebar')
      <!-- Navbar Header -->
      @include('Admin.layout.header')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Editor Image List </small></h3>
              </div>

              <!-- <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Search</button>
                    </span>
                  </div>
                </div>
              </div> -->

            </div>


            <div class="clearfix"></div>

            <div class="row">
            <div id="sumess"></div>
            @if(Session::has('success'))
             <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{{ Session::get('success')}}</strong>
                  @php
                  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
                  header("Cache-Control: post-check=0, pre-check=0", false);
                  header("Pragma: no-cache");
                  @endphp
            </div>        
            @endif
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <ul class="nav navbar-right panel_toolbox">
                    <a href="{{route('create.editor.image')}}" class="btn btn-default" style="background: #2A3F54;color:#FFFFFF"> Add Editor Image</a>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li> -->
                      <!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li> -->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content table-responsive">                   
                    <table id="example" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <!-- <th>Id#</th> -->
                          <th>S.no#</th>
                          <th>Image</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                              @if (!$editorImagelist->isEmpty())
                              <?php $i = 1; ?>
                              @foreach ($editorImagelist as $arr)
                              <input type="hidden" value="{{ $arr->id }}" id="table_id">
                              <tr id="row{{ $arr->id }}">
                                  <td>{{$i}}</td>
                                  <td>
                                  @if($arr->editor_image == "")
                                      <span id="preview-crop-image ">
                                          <img width="50px" height="50px"
                                              src="{{ url('public/images/imageicon.png')}}">
                                      </span>
                                      @else
                                      <span id="preview-crop-image ">
                                          <img width="50px" height="50px"
                                              src="{{ asset('public/upload/editorImages').'/'.$arr->editor_image }}">
                                      </span>
                                      @endif                                          
                                  </td>
                                  <td class="editor-image-status">
                                    @if($arr->status == 1)
                                      <div class="changediv{{$arr->id}} status-change"><button
                                              type="button"
                                              class="btn btn-success change-status{{$arr->id}}"
                                              onClick="EditorImageStatus('{{$arr->id}}')">Active</button>
                                      </div>
                                      @else
                                      <div class="changediv{{$arr->id}} status-change"><button
                                              type="button"
                                              class="btn btn-danger change-status{{$arr->id}}"
                                              onClick="EditorImageStatus('{{$arr->id}}')">Inactive</button>
                                      </div>
                                    @endif
                                  </td>
                                  <td>                                 
                                  <button class="btn  btn-dark p-2">
                                  <a href="javascript:void(0);" onClick="delete_editor_image('{{$arr->id}}')"
                                      data-id="{{$arr->id}}"
                                      class="text-white delete-editor-image{{$arr->id}}"
                                      style=" color: #FFFFFF;"><i class="fa fa-trash-o"></i>
                                      Delete </a></button>
                                      <button class="btn btn-dark p-2">
                                      <a href="{{route('edit.editor.image',[$arr->id])}}" class="text-white"
                                          style=" color: #FFFFFF;"><i
                                              class="fa fa-edit"></i>Edit</a></button>
                                  </td>
                              </tr>
                              <?php $i++; ?>
                              @endforeach
                              @endif
                          </tbody>
                    </table>
                  </div>
                </div>
              </div>
              </div>   
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('Admin.layout.footer')
        <!-- /footer content -->
      </div>
    </div>

    @include('Admin.layout.datatable_script')

   <script>
  //   $(document).ready(function () {
  //   $('#example').DataTable({
  //     processing: true,
  //     serverSide: true,
  //     "lengthMenu": [
  //         [10, 20, 50, 100, 500],
  //         [10, 20, 50, 100, 500]
  //     ],
  //     pageLength: 10,
  //     "order": [
  //         [0, "desc"],
  //         [0, 'desc']
  //     ],
  //     ajax: '{{route("get.messagelist")}}',     
  //     "columns": [
  //             {
  //               "data": "id",
  //               "name": 'id',
  //               "searchable": false,
  //               "visible": false
  //             },
  //             {
  //               "data": "srno",
  //               name: 'srno',
  //               searchable: false,
  //               orderable: false
  //             },
              
  //             {
  //               "data": "textmessage",
  //               orderable: false                
  //             },
        
  //             {
  //               "data": "status",
  //               orderable: false
  //             },
  //             {
  //               "data": "action",
  //               orderable: false
  //             }

  //             ],
  //             "rowId": "id",
  //   });
  //  });
   
  $(document).ready(function() {
    $('#example').DataTable({
      columnDefs: [ {
    
    } ]
    });
  });

  //  delete card
  function delete_editor_image(id) {
    toastDelete.fire({}).then(function(e) {
        if (e.value === true) {
            var imageid = $('.delete-editor-image' + id).data('id');
            $.ajax({
                type: 'post',
                url: "{{ route('delete.editor.image.post') }}",
                data: {
                    _token: "{{csrf_token()}}",
                    'id': imageid
                },
                success: function(data) {
                const obj = JSON.parse(data);
                console.log(obj.msg);
                $("#row" + id).remove();
                success_noti(obj.msg);
                }
            });
            // }
        } else {

            e.dismiss;

        }
    }, function(dismiss) {

        return false;

    });
};

//Active Inactive status change 
function EditorImageStatus(id) {
    var Statusvalue = $(".change-status" + id).text();
    console.log(Statusvalue);

    if (Statusvalue == 'Active') {
        Statusvalue = "Inactive";
    } else {
        Statusvalue = "Active";
    }
    $.ajax({
        type: 'post',
        url: "{{ route('editor.image.status.change') }}",
        data: {
            _token: "{{csrf_token()}}",
            'edit_image_id': id,
            'status': Statusvalue
        },
        success: function(data) {
            // $('#sumess').fadeIn().html('<div class="alert alert-success alert-block">' +
            //     '<button type="button" class="close" data-dismiss="alert">×</button>' +
            //     '<strong>' + data + '</strong>' +
            //     '</div>');

            // setTimeout(function() {
            //     $('#sumess').fadeOut("slow");
            // }, 300);
            success_noti(data);
            if (Statusvalue == 'Active') {
                $('.changediv' + id).html('<button type="button" class="btn btn-success change-status' + id + '"  onClick="EditorImageStatus(' + id + ')" >' + Statusvalue + '</button>');
            } else {
                $('.changediv' + id).html('<button type="button" class="btn btn-danger change-status' + id + '"  onClick="EditorImageStatus(' + id + ')" >' + Statusvalue + '</button>');
            }

        }
    });

}

</script>

  </body>
</html>