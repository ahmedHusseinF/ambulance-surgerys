<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>اعمال إدارية</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="logo">
				<h1><a href="#"><span>اسم</span> المستشفى  </a></h1>  <!--we will get it from database later on-->
				<p> بيانات طلبات حجز العمليات </p>
			</div>
			<div id="menu">
				<ul>
					<li class="current_page_item"><a href="#"> عرض جميع الطلبات </a></li>
					<li><a href="http://localhost/Application/public/SurgeryRooms/updateRoom"> اضافة جديد</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- end #header -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
						<h2 class="title"><a href="#"> غرفة جديدة </a></h2>
						<h3 class="title"><a href="#">بيانات الغرفة </a></h3>
						<div style="clear: both;">&nbsp;</div>
						<div class="col-lg-6">
						<div class ="row" >                  
						<div class ="col-sm">
						<div class="card">
						<div class="card-body card-block">
						
								
                        <form action="/Application/public/SurgeryRooms/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
                          
                         {{csrf_field()}}

                        	@foreach($allRequests as $request)
                        <div class="row form-group">
                            <div class="col col-md-3" ><label for="text-input" class=" form-control-label" ><a href="NewRequest/updateRequest?roomid={{$request->ReservationUniqueKey}}"> طلب {{$request->ReservationUniqueKey}} </a> </label></div>
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label" ><small>{{$request->created_at}}</small></label></div>
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label" > طلب عملية {{$request->operation_type}} التابع لمستشفى {{$request->HospitalName}}</label></div>
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label" >  اسم المريض: <a href="#"> {{$request->Name}} </a> </label></div>
							<div class="col col-md-3"><label for="text-input" class=" form-control-label" ><a href="#">توزيع</a></label></div>
							<div class="col col-md-3"><label for="text-input" class=" form-control-label" ><a href="NewRequest/deleteRequest?key={{$request->ReservationUniqueKey}}">حذف</a></label></div>
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label" ><p> -------------------------------------------------- </p></label></div>                       
                        </div>                     
                            @endforeach	
 
                        </form>
                      </div>
				</div>
				
                      </form>
                      </div>
                      
                      
                      
                      </div>
                      
            </div>
          </div>
						
					</div>
				</div>
				<!-- end #content -->
				<div id="sidebar">
					<ul>
						<li>
							<div id="search" >
								<form method="get" action="#">
									<div>
										<input type="text" name="s" id="search-text" value="" />
										<input type="submit" id="search-submit" value="اذهب" />
									</div>
								</form>
							</div>
							<div style="clear: both;">&nbsp;</div>
						</li>
						
						<li>
							
							<ul>
								<li><a href="#">تعديل حجز</a></li>
								<li><a href="#"> إلغاء أو حذف  حجز</a></li>
								<li><a href="#">خروج</a></li>
							</ul>
						</li>
						
					</ul>
				</div>
				<!-- end #sidebar -->
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page -->
</div>
</body>
</html>
