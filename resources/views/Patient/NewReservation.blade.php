<?php
	$Patient_Name = $_GET['patientname'];
//	$_POST['PatientID']= $_GET['patientID'];
$Patient_ID = $_GET['patientID'];
?>

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
						<h2 class="title"><a href="#">{{$Patient_Name}}| حجز جديد </a></h2>
						<h3 class="title"><a href="#">بيانات الحجز </a></h3>
						<div style="clear: both;">&nbsp;</div>
						<div class="col-lg-6">
						<div class ="row" >                  
						<div class ="col-sm">
						<div class="card">
						<div class="card-body card-block">
						
								
                        <form action="/NewestApplication/anotherProgramme/Queue/public/NewRequest/store?patientid={{$Patient_ID}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                          
                         {{csrf_field()}}
                          <div class="row form-group">
						  <div class="entry">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"><p> نوع العملية </p></label></div>
														<div class="col-12 col-md-9"><select  id="text-input" name="OperationType"  class="form-control" 
													
															<option value="">نوع العملية </option>
															@foreach($Operation_Names as $operation)
															<option value="{{$operation->Description}}">
															{{$operation->Description}}
																 </option>
															@endforeach														
													
													</div-->
                          </div>

                         
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label" after = "OperationType"><p> تاريخ الدخول </p></label></div>
														<div class="col-12 col-md-9"><input type="text" id="text-input" name="EntryDateDummy"  class="form-control"  </div-->
													</div>
	
						<div class="form-group">
									<div class="col col-md-3"><label for="radio-button" class=" form-control-label"><p> نوع التأمين </p></label></div>
									
									<div class="col-12 col-md-9"><input type="radio" id="radio-button" name="InsuranceType" value="على النفقة الشخصية"> على النفقة الشخصية<br> </div-->
									<div class="col-12 col-md-9"><input type="radio" id="radio-button" name="InsuranceType" value="تابع للتأمين">تابع للتأمين <br></div-->
									<div class="col-12 col-md-9"><input type="radio" id="radio-button" name="InsuranceType" value="على نفقة الدولة">على نفقة الدولة<br></div-->
									
									</div>
		
							<div class="form-group">
								<div class="col col-md-3"><label for="text-input" class=" form-control-label"><p> التكلفة </p></label></div>
								<div class="col-12 col-md-9"><input type="text" id="text-input" name="Cost" placeholder="0" class="form-control" </div-->
								</div>

							<div class="form-group">
								<div class="col col-md-3"><label for="text-input" class=" form-control-label"><p> المبلغ المدفوع مقدماً </p></label></div>
								<div class="col-12 col-md-9"><input type="text" id="text-input" name="Paid" placeholder="0" class="form-control" </div-->
							</div>

						  </div>
                         <div style="clear: both;">&nbsp;</div>
                            <div class="card-footer">
                        <button type="submit" class="btn btn-primary" >
                          <i class="fa fa-dot-circle-o"></i> <strong>إضافة </strong>
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
