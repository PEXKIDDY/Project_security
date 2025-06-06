<?php
require "core.php";
head();

if (isset($_GET['id'])) {
    $id     = (int) $_GET["id"];

    $result = $mysqli->query("SELECT * FROM `psec_logs` WHERE id = '$id'");
    $row    = mysqli_fetch_assoc($result);
    if (empty($id)) {
        echo '<meta http-equiv="refresh" content="0; url=all-logs.php">';
        exit();
    }
    if (mysqli_num_rows($result) == 0) {
        echo '<meta http-equiv="refresh" content="0; url=all-logs.php">';
        exit();
    }
	
    $ip = $row['ip'];
	if (isset($_GET['ban-ip'])) {
    
        $ip       = addslashes(htmlspecialchars($ip));
        $date     = date("d F Y");
        $time     = date("H:i");
        $reason   = $row['type'];
        $redirect = 0;
        $url      = "";
    
        if (filter_var($ip, FILTER_VALIDATE_IP)) {
            $queryvalid = $mysqli->query("SELECT * FROM `psec_bans` WHERE ip='$ip' LIMIT 1");
            $validator  = mysqli_num_rows($queryvalid);
                if ($validator <= "0") {
                    $query = $mysqli->query("INSERT INTO `psec_bans` (`ip`, `date`, `time`, `reason`, `redirect`, `url`) VALUES ('$ip', '$date', '$time', '$reason', '$redirect', '$url')");
                }
            }
        }

        if (isset($_GET['unban-ip'])) {
            $ip    = addslashes(htmlspecialchars($ip));
			
            $query = $mysqli->query("DELETE FROM `psec_bans` WHERE ip='$ip'");
        }
?>  
<div class="content-wrapper">

			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div class="content-header">
				
				<div class="container-fluid">
				  <div class="row mb-2">
        		    <div class="col-sm-6">
        		      <h4 class="m-0"><i class="fas fa-align-justify"></i> Log Details</h4>
        		    </div>
        		    <div class="col-sm-6">
        		      <ol class="breadcrumb float-sm-right">
        		        <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i> Admin Panel</a></li>
        		        <li class="breadcrumb-item active">Log Details</li>
        		      </ol>
        		    </div>
        		  </div>
    			</div>
            </div>

				<!--Page content-->
				<!--===================================================-->
				<div class="content">
				<div class="container-fluid">

                <div class="row">
				<div class="col-md-12">
				    <div class="card card-primary card-outline">
						<div class="card-header">
							<h3 class="card-title"><i class="fas fa-file-alt"></i> <b>Log #<?php
    echo $row['id'];
?></b> - Details</h3>&nbsp;&nbsp;&nbsp;
                            <div class="float-sm-right">
<?php
    if (get_banned($row['ip']) == 1) {
        echo '
										    <a href="log-details.php?id=' . $row['id'] . '&unban-ip" class="btn btn-flat btn-success btn-sm"><i class="fas fa-ban"></i> Unban IP</a>
									        ';
    } else {
        echo '
										    <a href="log-details.php?id=' . $row['id'] . '&ban-ip" class="btn btn-flat btn-warning btn-sm"><i class="fas fa-ban"></i> Ban IP</a>
									        ';
    }
    echo '
											<a href="all-logs.php?delete-id=' . $row['id'] . '" class="btn btn-flat btn-danger btn-sm"><i class="fas fa-trash"></i> Delete Log</a>
';
?>
                            </div>
						</div>
						<div class="card-body">
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">
                                                        <i class="fas fa-user"></i> IP Address
                                                    </label>
													<input type="text" class="form-control" value="<?php
    echo $row['ip'];
?>" readonly>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">
                                                        <i class="fas fa-calendar"></i> Date and Time
                                                    </label>
													<input type="text" class="form-control" value="<?php
    echo '' . $row['date'] . ' at ' . $row['time'] . '';
?>" readonly>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">
                                                         <i class="fas fa-globe"></i> Browser
                                                    </label>
                                                    <div class="input-group mar-btm">
											            <span class="input-group-addon">
                                                            <img src="assets/img/icons/browser/<?php
    echo $row['browser_code'];
?>.png" />
                                                        </span>
													   <input type="text" class="form-control" value="<?php
    echo $row['browser'];
?>" readonly>
                                                    </div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">
                                                         <i class="fas fa-desktop"></i> Operating System
                                                    </label>
                                                    <div class="input-group mar-btm">
											            <span class="input-group-addon">
                                                            <img src="assets/img/icons/os/<?php
    echo $row['os_code'];
?>.png" />
                                                        </span>
                                                        <input type="text" class="form-control" value="<?php
    echo $row['os'];
?>" readonly>
                                                    </div>
												</div>
											</div>
										</div>
                                        <div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">
                                                         <i class="fas fa-flag"></i> Country
                                                    </label>
                                                    <div class="input-group mar-btm">
											            <span class="input-group-addon">
                                                            <img src="assets/plugins/flags/blank.png" class="flag flag-<?php
    echo strtolower($row['country_code']);
?>" alt="<?php
    echo $row['country'];
?>" />
                                                        </span>
                                                        <input type="text" class="form-control" value="<?php
    echo $row['country'];
?>" readonly>
                                                    </div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">
                                                         <i class="fas fa-map-pin"></i> Region
                                                    </label>
													<input type="text" class="form-control" value="<?php
    echo $row['region'];
?>" readonly>
												</div>
											</div>
										</div>
                                        <div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">
                                                         <i class="fas fa-map"></i> City
                                                    </label>
													<input type="text" class="form-control" value="<?php
    echo $row['city'];
?>" readonly>
												</div>
											</div>
                                            <div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">
                                                         <i class="fas fa-cloud"></i> Internet Service Provider
                                                    </label>
													<input type="text" class="form-control" value="<?php
    echo $row['isp'];
?>" readonly>
												</div>
											</div>
										</div>
                                        <div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">
                                                        <i class="fas fa-exclamation-triangle"></i> Threat Type
                                                    </label>
													<input type="text" class="form-control" value="<?php
    echo $row['type'];
?>" readonly>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
                                                    <label class="control-label">
                                                        <i class="fas fa-reply"></i> Referer URL
                                                    </label>
                                                    <input type="text" class="form-control" value="<?php
    echo $row['referer_url'];
?>" readonly>
												</div>
											</div>
										</div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <div class="form-group">
												<label class="control-label">
                                                    <i class="fas fa-user-secret"></i> User Agent
                                                </label>
                                                <textarea placeholder="User Agent" rows="2" class="form-control" readonly><?php
    echo $row['useragent'];
?></textarea>
                                            </div>
                                            </div>	
										</div>
                                        <hr />
                                        <div class="row">
											<div class="col-sm-4">
                                            <div class="form-group">
												<label class="control-label">
                                                    <i class="fas fa-file-alt"></i> Attacked Page
                                                </label>
                                                <input type="text" class="form-control" value="<?php
    echo $row['page'];
?>" readonly>
                                            </div>
                                            </div>	
                                            <div class="col-sm-8">
                                            <div class="form-group">
												<label class="control-label">
                                                    <i class="fas fa-code"></i> Query used for the attack
                                                </label>
                                                <textarea placeholder="Query" rows="2" class="form-control" readonly><?php
    echo $row['query'];
?></textarea>
                                            </div>
                                            </div>
										</div>
                            
                                        <hr />

                                        <label class="control-label">
                                            <i class="fas fa-location-arrow"></i> Possible Location
                                        </label>
									    <center><div id="mapdiv" class="map_div"></div></center>
									
									</div>
                     </div>
                </div>
				</div>
                    
				</div>
				</div>
				<!--===================================================-->
				<!--End page content-->

			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->
</div>

<script type="text/javascript">

    map = new OpenLayers.Map("mapdiv");
    map.addLayer(new OpenLayers.Layer.OSM());

    var lonLat = new OpenLayers.LonLat(<?php
    echo $row['longitude'];
?>, <?php
    echo $row['latitude'];
?>)
        .transform(
            new OpenLayers.Projection("EPSG:4326"),
            map.getProjectionObject()
        );
          
    var zoom = 18;
    var markers = new OpenLayers.Layer.Markers("Markers");
	
    map.addLayer(markers);
    markers.addMarker(new OpenLayers.Marker(lonLat));
    map.setCenter(lonLat, zoom);
</script>
<?php
    footer();
} else {
    echo '<meta http-equiv="refresh" content="0; url=all-logs.php">';
    exit();
}
?>