@extends('hub.hub_layout')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<div class="row">
         <div class="row input-field col m6 s12">
             <h4 class="head" >ALL MY APPLICATIONS</h4>
         </div>
         <div class="row input-field col m5">
         <div class="search-container">
            <form action="">
            <input type="text" placeholder="SEARCH_NAME/MEMBER NUMBER /QUERY NUMBER" name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
         
         </div>
         
      </div>
      <div class="row">
      <hr class="horizontzl_line mb-3" style="width:90%;">
      </div>

      <div class="row"style="width:90%;">
        <div class="row">
            <table class="striped ">
                <thead class="table-head">
                <?php
                // $month = filter_input(INPUT_POST,'id_select',FILTER_SANITIZE);
                	$brokercode = Session::get('brokercode');
                   
                  $count = DB::table('tbl_advisors')
                                ->where('status',1)
                                ->where('brokercode', $brokercode)
                                ->count();
                ?>
                <tr>
                    <th colspan='5' class="table-title-allApp"> Submitted Applications</th>
                    <th class="table-title"><div class="badge_allAPP"> New |{{$count}}</div></th>
                </tr>
                <div class="row">
                    <tr>
                        <th colspan='6' class="select" ><label for="id_select">Months</label>
                            <select id="id_select" name="month" class="select2 browser-default">
                            <option  value="01">JANUARY</option>
                            <option  value="02">FEBRUARY</option>
                            <option  value="03">MARCH</option>
                            <option  value="04">APRIL</option>
                            <option  value="05">MAY</option>
                            <option  value="06">JUNE</option>
                            <option  value="07">JULY</option>
                            <option  value="08">AUGUST</option>
                            <option  value="09">SEPTEMBER</option>
                            <option  value="10">OCTOBER</option>
                            <option  value="11">NOVEMBER</option>
                            <option  value="12">DECEMBER</option>
                            </select>
                        </th>
                    </tr>
                <script>
                $(document).ready(function () { 
                $.ajax({
                        type: 'GET',
                        url: '/month',
                        dataType: 'json',
                        data: {'month' : '01'},
                        success:function(response){
                            console.log(response.data);

                            var resultData = response.data;
                            console.log(resultData);
                            var tableData = '';
                            //alert(data);
                            $.each(resultData, function(index, row){
                                var route = "{{ URL::to('/view-submitted/') }}/"+row.user_id;
                                tableData = '<tr>\
                                <td>'+row.main_surname+' '+row.main_firstname+'</td>\
                                <td>'+row.created_at+'</td>\
                                <td>'+row.capturedby+'</td>\
                                <td><a href = "'+route+'" class="complete-action"><i class="fa fa-eye fa-lg"> </i> View</td>\
                                </tr>';
                                $("tbody").append(tableData);
                            })
                            
                        }
                    });  
                    $('body').on('change','#id_select', function() {
                        var month = this.value;
                        var tableSize = $("#tableData tr").length;
                        if(tableSize > 0)
                        {
                            $("#tableData tr").remove();
                        }
                        $.ajax({
                            type: 'GET',
                            url: '/month',
                            dataType: 'json',
                            data: {'month' : month},
                            success:function(response){
                                console.log(response.data);

                                var resultData = response.data;
                               
                                var tableData = '';
                                //alert(data);
                                $.each(resultData, function(index, row){
                                    var route = "{{ URL::to('/view-submitted/') }}/"+row.user_id;
                                    tableData = '<tr>\
                                    <td>'+row.main_surname+' '+row.main_firstname+'</td>\
                                    <td>'+row.created_at+'</td>\
                                    <td>'+row.capturedby+'</td>\
                                    <td><a href = "'+route+'" class="complete-action"><i class="fa fa-eye fa-lg"> </i> View</td>\
                                    </tr>';
                                    console.log(row.member_name)
                                    $("#tableData").append(tableData)
                                })
                                
                               ;
                            }
                        });
                    });
                }); 
                </script>
                <tbody id="tableData">
                
                </tbody>
                </div>
                </thead>
            </table>
        </div>
    </div>
@endsection
