<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>حجز العمليات</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="logo">
				<h1><a href="#"><span>اسم</span> المستشفى  </a></h1>  <!--we will get it from database later on-->
				<p> حجز العمليات الفوري</p>
			</div>
			<div id="menu">
				<ul>
					<li class="current_page_item"><a href="#">الحجز</a></li>
					<li><a href="#">الاستفسارات</a></li>
					<li><a href="#">الشكاوي</a></li>
					
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
						<h2 class="title"><a href="#">حجز جديد </a></h2>
						<h3 class="title"><a href="#">بيانات المريض </a></h3>
						<div style="clear: both;">&nbsp;</div>
						<div class="col-lg-6">
						<div class ="row" >                  
						<div class ="col-sm">
						<div class="card">
						<div class="card-body card-block">
						
								
                        <form action="/NewestApplication/anotherProgramme/Queue/public/Patient/store" method="POST" enctype="multipart/form-data" class="form-horizontal">
                          
                         {{csrf_field()}}
                          <div class="form-group">
						  <div class="entry">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"><p> الاسم </p></label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="Name" placeholder="الأسم الرباعى" class="form-control" </div-->
                          </div>

                         
                          <div class="form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label" ><p> الرقم القومي </p></label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="ID" placeholder="الرقم القومى" class="form-control"  </div-->
							</div>
						
						  <div class="form-group">
							<div class="col col-md-3"><label for="text-input" class=" form-control-label"><p> السن </p></label></div>
							<div class="col-12 col-md-9"><input type="text" id="text-input" name="Age" placeholder="0" class="form-control" </div-->
						  </div>
		
						  <div class="form-group">
								<div class="col col-md-3"><label for="text-input" class=" form-control-label"><p> رقم الهاتف </p></label></div>
								<div class="col-12 col-md-9"><input type="text" id="text-input" name="Phone number" placeholder="02XXXXXXXX" class="form-control" </div-->
							  </div>

						<div class="form-group">
							<div class="col col-md-3"><label for="text-input" class=" form-control-label"><p> رقم المحمول </p></label></div>
							<div class="col-12 col-md-9"><input type="text" id="text-input" name="Mobile number" placeholder="01XXXXXXXXXX" class="form-control" </div-->
						  </div>
						
    					  <div class="form-group">
								<div class="col col-md-3"><label for="text-input" class=" form-control-label"><p> رقم التأمين </p></label></div>
								<div class="col-12 col-md-9"><input type="text" id="text-input" name="Insurance number" placeholder="0" class="form-control" </div-->
							  </div>
	
						<div class="form-group">
									<div class="col col-md-3"><label for="radio-button" class=" form-control-label"><p> النوع </p></label></div>
									
									<div class="col-12 col-md-9"><input type="radio" id="radio-button" name="group1" value="M">ذكر<br> </div-->
									<div class="col-12 col-md-9"><input type="radio" id="radio-button" name="group1" value="F">أنثى<br></div-->
									
									</div>
		
							<div class="form-group">
								<div class="col col-md-3"><label for="text-input" class=" form-control-label"><p> تعليق على حالة المريض </p></label></div>
								<div class="col-12 col-md-9"><input type="text" id="text-input" name="Comment" placeholder="لا تعليق" class="form-control" </div-->
							  </div>
						  </div>
                         <div style="clear: both;">&nbsp;</div>
                            <div class="card-footer">
                        <button type="submit" class="btn btn-primary" >
                          <i class="fa fa-dot-circle-o"></i> <strong>تأكيد الحجز </strong>
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> <strong> البدء من جديد </strong>
                        </button>
                      </div>
                    </div>  
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
