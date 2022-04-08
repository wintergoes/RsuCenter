@extends('layouts.home')

@section('content')
<script type="text/javascript" src="https://api.map.baidu.com/api?v=3.0&ak=lKXGBob7gIDaPPzrfc6qtHTBNukNcLzE"></script>


                      

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                 <div class="card radius-6 border-1 border-grey111111" >
                    <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="text-center" style="width: 90%;">
                                            <p class="mb-0">RSU数量</p>
                                            <h4 class="my-1 text-info">5台</h4>
                                    </div>
                                    <div class="widgets-icons-2 rounded-circle text-white ms-auto"><i class="bx bxs-radio"></i>
                                    </div>
                            </div>
                    </div>
                 </div>
           </div>
                          <div class="col">
                                <div class="card radius-6 border-1 border-grey111111" >
                                   <div class="card-body">
                                           <div class="d-flex align-items-center">
                                                   <div class="text-center" style="width: 90%;">
                                                           <p class="mb-0 ">OBU数量</p>
                                                           <h4 class="my-1 text-info">5台</h4>
                                                   </div>
                                                   <div class="widgets-icons-2 rounded-circle  text-white ms-auto"><i class="bx bxs-devices"></i>
                                                   </div>
                                           </div>
                                   </div>
                                </div>
                          </div>
                       <div class="col">
                        <div class="card radius-6 border-1 border-grey111111" >
                               <div class="card-body">
                                       <div class="d-flex align-items-center">
                                               <div class="text-center" style="width: 90%;">
                                                       <p class="mb-0 ">道路预警信息</p>
                                                       <h4 class="my-1 text-danger">3个</h4>
                                               </div>
                                               <div class="widgets-icons-2 rounded-circle  text-white ms-auto"><i class="bx bxs-no-entry"></i>
                                               </div>
                                       </div>
                               </div>
                        </div>
                  </div>
                          <div class="col">
                                <div class="card radius-6 border-1 border-grey111111" >
                                   <div class="card-body">
                                           <div class="d-flex align-items-center">
                                                   <div class="text-center" style="width: 90%;">
                                                           <p class="mb-0 ">道路风险规避</p>
                                                           <h4 class="my-1 text-success">360次</h4>
                                                   </div>
                                                   <div class="widgets-icons-2 rounded-circle  text-white ms-auto"><i class="bx bxs-time"></i>
                                                   </div>
                                           </div>
                                   </div>
                                </div>
                          </div> 
                        </div>


<div class="row">
<div class="col-12 col-lg-8 border-1">
   <div class="card radius-6  border-1 border-grey111111">
                               <div class="card-body">
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                   
             
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                     <div class="d-flex align-items-center mb-3">
                                             <div>
                                                 <h6 class="mb-0 card-title"><i class="bx bx-map"></i> 运行轨迹</h6>
                                             </div>
                                         
                                     <div class="d-flex align-items-center ms-auto font-13 gap-2">
                                             <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #14abef"></i>RSU</span>
                                             <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #ffc107"></i>OBU</span>
                                             <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: red"></i>异常信息</span>
                                     </div>                                         
                                             <div class="dropdown ms-auto">
                                                     <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                                                     </a>
                                                     <ul class="dropdown-menu">
                                                             <li><a class="dropdown-item" href="javascript:;">查看详情</a></li>
                                                     </ul>
                                             </div>
                                     </div>

                                     <div id="bdmap_container" style="width: 100%; height: 630px"></div>
                               </div>
                       </div>
                </div>
    
    
                <div class="col-12 col-lg-4 ">
    <div class="card radius-6 border-1 border-grey111111">
                                <div class="card-body">
                                     <div class="d-flex align-items-center mb-3">
                                             <div>
                                                     <h6 class="mb-0"><i class="bx bx-video-plus"></i> 实时图像</h6>
                                             </div>
                                             <div class="dropdown ms-auto">
                                                     <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                                                     </a>
                                                     <ul class="dropdown-menu">
                                                             <li><a class="dropdown-item" href="javascript:;">更多</a></li>
                                                     </ul>
                                             </div>
                                     </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
       
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2">
					<div class="col">
						<div class="">
							<img src="images/jzw1.jpg" class="card-img-top" alt="...">
							<div class="card-body text-center">
								<p class="card-title">OBU0001</p>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="">
							<img src="images/jzw2.jpg" class="card-img-top" alt="...">
							<div class="card-body text-center">
								<p class="card-title">OBU0002</p>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="">
							<img src="images/jzw3.jpg" class="card-img-top" alt="...">
							<div class="card-body text-center">
								<p class="card-title">OBU0003</p>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="">
							<img src="images/jzw4.jpg" class="card-img-top" alt="...">
							<div class="card-body text-center">
								<p class="card-title">OBU0004</p>
                                                        </div>
						</div>
					</div>
    
    					<div class="col">
						<div class="">
							<img src="images/jzw3.jpg" class="card-img-top" alt="...">
							<div class="card-body text-center">
								<p class="card-title">OBU0005</p>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="">
							<img src="images/jzw4.jpg" class="card-img-top" alt="...">
							<div class="card-body text-center">
								<p class="card-title">OBU0006</p>
                                                        </div>
						</div>
					</div>
				</div>                                      
                                </div>
                        </div>
                </div>
             </div>

<script>
    var map = new BMap.Map("bdmap_container", {
       coordsType: 5 // coordsType指定输入输出的坐标类型，3为gcj02坐标，5为bd0ll坐标，默认为5。
                     // 指定完成后API将以指定的坐标类型处理您传入的坐标
    });          // 创建地图实例  
    var point = new BMap.Point(120.258579,36.14043);  // 创建点坐标  
    map.centerAndZoom(point, 13);                 // 初始化地图，设置中心点坐标和地图级别 
    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
    
var point1 =   new BMap.Point(120.142482,36.106962);  // 创建点坐标    
var marker = new BMap.Marker(point1);        // 创建标注    
map.addOverlay(marker);      
</script>

@endsection