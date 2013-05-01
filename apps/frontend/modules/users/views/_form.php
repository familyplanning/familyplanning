<div class="large-12 columns" >
                    <form action="" method="post" onsubmit="return(confirm('Etes-vous sûr des valeurs entrées?'))";>
                        <div class="row">
                            <div class="large-2 columns" >&nbsp;
                            </div>
                            <div class="large-4 columns" >
								<?php if (isset($erreurs) && in_array(Users::USERNAME_INVALIDE, $erreurs)) echo '<span class="error_list">Le username est invalide.</span><br />'; ?>
                                <input type="text" <?php if (isset($users)) { echo 'value="'. $users['username'] . '"'; } else {echo 'placeholder="Nom d\'utilisateur"';} ?>  name="username"  id="username" />
                            </div>
							
                            <div class="large-4 columns" >
								<?php if (isset($erreurs) && in_array(Users::EMAIL_INVALIDE, $erreurs)) echo '<span class="error_list">L\'email est invalide.</span><br />'; ?>
                                <input type="email" <?php if (isset($users)) { echo 'value="'. $users['email'] . '"'; } else {echo 'placeholder="Email"';} ?> name="email"  id="email" />
								
								
                            </div>
                            <div class="large-2 columns" >&nbsp;
                            </div>
                        </div>
                        <div class="row">
                            <div class="large-2 columns" >&nbsp;
                            </div>
                            <div class="large-4 columns" >
								<?php if (isset($erreurs) && in_array(Users::MOTDEPASSE_INVALIDE, $erreurs)) echo '<span class="error_list">Le mot de passe est invalide.<br /></span>'; ?>
                                <input type="password" <?php if (isset($users)) { echo 'value="'. $users['mot_de_passe'] . '"'; } else {echo 'placeholder="Mot de passe"';} ?> name="mot_de_passe" id="mot_de_passe" />
                            </div>
                            <div class="large-4 columns" >
								<?php if (isset($erreurs) && in_array(Users::MOTDEPASSE_INVALIDE, $erreurs)) echo '<span class="error_list">Le mot de passe est invalide.</span><br />'; ?>
                                <input type="password" name="mot_de_passe_prim" id="mot_de_passe_prim" <?php if (isset($users)) { echo 'value="'. $users['mot_de_passe'] . '"'; } else {echo 'placeholder="Confirmation du mot de passe"';} ?> />
                            </div>
                            <div class="large-2 columns" >&nbsp;
                            </div>
                        </div>
                        <div class="row">
                            <div class="large-2 columns" >&nbsp;
                            </div>
                            <div class="large-4 columns" >
                                <label>Régularité du cycle</label>
                                <select name="regular">
                                    <option value="1">Oui</option>
                                    <option value="0">Non</option>
                                </select>
                            </div>
                            <div class="large-4 columns" >
                                <label>Date de début du cycle</label>
								<?php if (isset($erreurs) && in_array(Users::DATEPREMIERCYCLE_INVALIDE, $erreurs)) echo '<span class="error_list">La date est invalide.</span><br />'; ?>
                                <input type="date"  name="datepremiercycle" id="datepremiercycle" <?php if (isset($users)) { echo 'value="'. $users['datepremiercycle'] . '"'; } else {echo 'jj/mm/aaaa';} ?> />
                            </div>
                            <div class="large-2 columns" >&nbsp;
                            </div>
                        </div>
                        <div class="row">
                            <div class="large-2 columns" >&nbsp;
                            </div>
                            <div class="large-4 columns" >
                                <label>Durée moyenne du cycle</label>
                                <select name="dureecycle" id="dureecycle">
									<option value="25" <?php if (isset($users) && $users['dureecycle']=="25") {echo ' selected="selected"';}?>>25</option>
									<option value="26" <?php if (isset($users) && $users['dureecycle']=="26") {echo ' selected="selected"';}?>>26</option>
									<option value="27" <?php if (isset($users) && $users['dureecycle']=="27") {echo ' selected="selected"';}?>>27</option>
									<option value="28" <?php if (isset($users) && $users['dureecycle']=="28") {echo ' selected="selected"';}?>>28</option>
									<option value="29" <?php if (isset($users) && $users['dureecycle']=="29") {echo ' selected="selected"';}?>>29</option>
									<option value="30" <?php if (isset($users) && $users['dureecycle']=="30") {echo ' selected="selected"';}?>>30</option>
									<option value="31" <?php if (isset($users) && $users['dureecycle']=="31") {echo ' selected="selected"';}?>>31</option>
									<option value="32" <?php if (isset($users) && $users['dureecycle']=="32") {echo ' selected="selected"';}?>>32</option>
								</select>
                            </div>
                            <div class="large-4 columns" >
                                <label>Durée moyenne des règles</label>
                                <select name="dureeregle" id="dureeregle">
									<option value="3" <?php if (isset($users) && $users['dureeregle']=="3") {echo ' selected="selected"';}?>>3</option>
									<option value="4" <?php if (isset($users) && $users['dureeregle']=="4") {echo ' selected="selected"';}?>>4</option>
									<option value="5" <?php if (isset($users) && $users['dureeregle']=="5") {echo ' selected="selected"';}?>>5</option>
									<option value="6" <?php if (isset($users) && $users['dureeregle']=="6") {echo ' selected="selected"';}?>>6</option>
									<option value="7" <?php if (isset($users) && $users['dureeregle']=="7") {echo ' selected="selected"';}?>>7</option>
								</select>
                            </div>
                            <div class="large-2 columns" >&nbsp;
                            </div>
                        </div>
						<div class="row">
                            <div class="large-2 columns" >&nbsp;
                            </div>
							
							<?php
							if(isset($users) && !$users->isNew())
							{
						?>
						<input type="hidden" name="id" value="<?php echo $users['id']; ?>" />
						
				<?php
					}
					
				?>
							
							
							
							
                            <div class="large-4 columns" >
                                <input type="submit" value="Envoyer" class=" right button success" />
								
                            </div>
                            <div class="large-4 columns" >
                                <input type="reset" value="RAS" class="button" />
                            </div>
                            <div class="large-2 columns" >&nbsp;
                            </div>
                        </div>
                    </form>
                </div>