<main class="mdl-layout__content mdl-color--grey-100">
	<div class="row">
		<div class="col s12">
			<div class="card">
				<div class="card-content">
					<center><span class="card-title accent-4 titulos">DETALLE DE ORDEN DE TRABAJO</span></center>
						<div class="row">
							<center>
								<?php 
									foreach ($consecutivo as $key) {
										echo "
								<div class='col s4'>
									<span class='card-title purple-text darken-4' id='ordP'>".$key['NoOrder']."</span><br/>
									<label class='labelValidacion'>N° ORDEN DE PRODUCCIÓN</label>
								</div>
								<div class='col s4'>
									<span class='card-title purple-text darken-4' id='ordC'>".$key['Consecutivo']."</span><br/>
									<label class='labelValidacion'>N° CONSECUTIVO DE TRABAJO</label>
								</div>
								<div class='col s4'>
									<span class='card-title purple-text darken-4' id='ordT'>".$key['Turno']."</span><br/>
									<label class='labelValidacion'>TURNO</label>
								</div>";
									}
								?>
							</center>
						</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12">
			<div class="card">
				<div class="card-content" id="tabla-cargas">
                    <div class="row">
                        <div class="col s12 m12">
               <p class="right-align"> <a href="../menuOrdenTrabajo/<?php echo $key["IdReporteDiario"]?>" 
                class="btn purple darken-1 waves-effect waves-light tooltipped" data-position="left" data-tooltip="Regresar">
                <i class="material-icons">keyboard_backspace</i></a></p>
                            <center><h5 class="card-title titulos">CARGAS PULPER</h5></center>
                        </div>
                    </div>
                    <a class="Btnadd btn waves-effect waves-light" id="btnAgregarf" href="#modal1" style="background-color:#831F82;">AGREGAR
						<i class="material-icons right">add</i>
                    </a><br>
                    <div class="row">
						<div class="col s4 m4 s4">
							<div class="card hoverable">
								<h6 class="center-align"><b class="purple-text darken-1 ">CARGA TOTAL</b></h6>
								<div class="container">
									<h6 class="center-align purple-text darken-1"><?php echo $cargaTotal;?></h6><br>
								</div>
							</div>
						</div>
                    </div><br>

                    <center><h6 id="ocultar">NO HAY DATOS QUE MOSTRAR</h6></center>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12">
			<div class="card">
				<div class="card-content">
					<div class="row">
                        <div class="col s12 m12">
                            <center><h5 class="card-title titulos">HORAS MOLIENDA</h5></center>
                        </div>
					<a class="Btnadd btn waves-effect waves-light" id="btnAgregaHM" href="#modal12" style="background-color:#831F82;">AGREGAR
						<i class="material-icons right">add</i>
                    </a>
                    <center><h6 id="ocultar2">NO HAY DATOS QUE MOSTRAR</h6></center>
                    </div>	
				</div>
			</div>
		</div>
	</div>
<!--PANTALLAS MODALES-->
  <div id="modal11" class="modal">
    <div class="modal-content">
		<div class="card">
			<div class="card-content">
				<center><h5 class="card-title titulos">AGREGAR CARGA PULPER</h5></center>
				<div class="row">
					<div class="col s12 m12">
						<?php 
			                if(!($consecutivo)){                                   
			                } else {
			                    foreach ($consecutivo as $key) {
			                        echo "<input name='idRptD' id='idRptD' type='hidden' value='".$key['IdReporteDiario']."' >";
			                        }
			                    }
			            ?>
                        <select name="tipoFibra" id="tipoFibra" class="chosen-select browser-default">
                            <option value="" disabled selected>TIPO FIBRA</option>
                            <?PHP
                            if(!$tipoFibra){
                            } else {
                                foreach($tipoFibra as $key){
                                    echo '<option value="'.$key['IdInsumo'].'">'.$key['Descripcion'].'</option>';
                                }
                            }
                            ?>
                        </select>                   
					</div><br><br>
		            <div class="row">
		                <div class="input-field col s7 m7 s7">
		                    <input id="cantidad" type="text">
		                    <label for="cantidad">CANTIDAD A INGRESAR</label>
		                </div>
		                <div class="col s5 m5 s5"><br>
		                	<span class='purple-text darken-4'>KILOGRAMOS</span>
		                </div>
		            </div><br><br>
				    <div class="row">                    
		                <div class="center">
							<?php
								foreach ($consecutivo as $key) {
									if ($key['Estado'] == 0) {
										echo '  
										 <span class="badge">El Consecutivo ya ha sido cerrado</span><br>  
										<a class="Btnadd btn waves-effect waves-light disabled" href="#" style="background-color:#831F82;">AGREGAR
											<i class="material-icons right">send</i>
										</a>';
									} else {
										echo '
										<a class="Btnadd btn waves-effect waves-light" id="agregarCPulper" onclick="guardarCargaPulper()" href="#" style="background-color:#831F82;">AGREGAR
											<i class="material-icons right">send</i>
										</a>
										';
									}
									
								}
							?>
		                    <a class="Btnadd btn waves-effect waves-light" id="cerrarCP" href="#" hre style="background-color:#831F82;">CERRAR
		                        <i class="material-icons right">clear</i>
		                    </a>
				        </div>
		            </div>				
				</div>
			</div>
		</div>
    </div>
  </div>
  <div id="modal12" class="modal">
    <div class="modal-content">
		<div class="card">
			<div class="card-content">
				<center><h5 class="card-title titulos">AGREGAR HORA MOLIENDA</h5></center>
				<div class="row">
					<div class="col s12 m12">
						<?php 
			                if(!($consecutivo)){                                   
			                } else {
			                    foreach ($consecutivo as $key) {
			                        echo "<input name='idRptD' id='idRptD' type='hidden' value='".$key['IdReporteDiario']."' >";
			                        }
			                    }
			            ?>                
					</div>
					<h2 class="titulo-secundario center">CARGA BATIDO</h2><br><br>
					<div class="row">
					    <div class="input-field col s12 m6 s6">
							<input id="timeHM1" name="timeHM1" class="timepicker" type="time">
							<label for="timeHM1">HORA INICIO</label>
					    </div>					    
					    <div class="input-field col s12 m6 s6">
							<input id="timeHM2" name="timeHM2" class="timepicker" type="time">
							<label for="timeHM2">HORA FINAL</label>
					    </div>
					</div><br><br><br>
				    <div class="row">                    
		                <div class="center">
				      	 <?php
						   	foreach ($consecutivo as $key) {
								   if ($key['Estado'] == 0) {
									   echo '
									    <span class="badge">El Consecutivo ya ha sido cerrado</span><br> 
									<a class="Btnadd btn waves-effect waves-light disabled" href="#">AGREGAR
										<i class="material-icons right">send</i>
									</a>
									   ';
								   } else {
									   echo ' 
									<a class="Btnadd btn waves-effect waves-light" id="agregarHMolienda" onclick="guardarHorasMolienda()" href="#">AGREGAR
										<i class="material-icons right">send</i>
									</a>';
								   }
								   
							   }
						   ?>
		                    <a class="Btnadd btn waves-effect waves-light" id="cerrarHM" href="#";>CERRAR
		                        <i class="material-icons right">clear</i>
		                    </a>
				        </div>
		            </div>				
				</div>
			</div>
		</div>
    </div>
  </div>
  <!-- EDITANDO LAS HORAS MOLIENDAS -->
  <div id="modal13" class="modal">
    <div class="modal-content">
		<div class="card">
			<div class="card-content">
				<center><h5 class="card-title titulos">EDITAR HORAS MOLIENDAS</h5></center>
				<div class="row">
					<div class="col s12 m12">
						<?php 
			                if(!($consecutivo)){                                   
			                } else {
			                    foreach ($consecutivo as $key) {
			                        echo "<input name='idRptD' id='idRptD' type='hidden' value='".$key['IdReporteDiario']."' >";
			                        }
			                    }
			            ?>                
					</div>
					<input name='idHora' id='idHora' type='hidden'>
					<h2 class="titulo-secundario center">CARGA BATIDO</h2><br><br>
					<div class="row">
					    <div class="input-field col s12 m6 s6">
							<input id="timeHM12" name="timeHM12" class="timepicker" type="time">
							<label for="timeHM12">HORA INICIO</label>
					    </div>					    
					    <div class="input-field col s12 m6 s6">
							<input id="timeHM22" name="timeHM22" class="timepicker" type="time">
							<label for="timeHM22">HORA FINAL</label>
					    </div>
					</div><br><br><br>
				    <div class="row">                    
		                <div class="center">
				      	    <a class="Btnadd btn waves-effect waves-light" id="actualizaHMolienda" onclick="actualizarHorasMolienda()" href="#">ACTUALIZAR
		                        <i class="material-icons right">send</i>
		                    </a>
		                    <a class="Btnadd btn waves-effect waves-light" id="cerrarHM1" href="#">CERRAR
		                        <i class="material-icons right">clear</i>
		                    </a>
				        </div>
		            </div>				
				</div>
			</div>
		</div>
    </div>
  </div>
</main>