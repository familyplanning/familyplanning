<ul id="cbp-bislideshow" class="cbp-bislideshow">
                <li><img src="images/Mother-child.jpg" alt="image01"/></li>
                <li><img src="images/mother-child1.jpg" alt="image02"/></li>
                <li><img src="images/family.jpg" alt="image03"/></li>
            </ul>
            <div class="row">
                <div class="large-6 large-centered columns" >
                    <div id="connexion" class="reveal-modal">
                        <h2>Connexion</h2>
                        <form action="connexion.html" method="post">
							<input type="text" value="Username" name="username"  id="username" />
                            <input type="password" value="Mot de passe" name="mot_de_passe" id="mot_de_passe" />
							<input type="submit" value="Connexion" class="button success" />
                        </form>
                        <a class="close-reveal-modal">&#215;</a>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="large-9 large-centered columns" >
                    <div id="projet" class="reveal-modal">
							<h2>Le projet</h2>
							Family planning est un projet né d'un constat amer 
							qui a suscité une réponse de la part d'une équipe
							de quatre jeunes ingénieurs Béninois. En effet, il
							n'est pas rare de voir des élèves ou étudiantes des pays
							africains piquer des grossesses non désirées généralement
							par manque de prudence, par négligence mais surtout par ignorance
							des notions de suivi de leur cycle menstruel. Ces grossesses non
							désirées constituent de véritables freins qui retardent ou mettent 
							définitivement un terme à l’évolution scolaire de ces nombreuses jeunes
							filles, brisant ainsi leur rêve de devenir  ingénieur, médecin ou autre
							élite promise à une belle carrière professionnelle. Family planning vise 
							donc à réduire ces cas de grossesses non désirées en permettant aux jeunes
							filles de suivre l'évolution de leur cycle menstruel grâce à des solutions
							simples, pratiques, accessibles et basées sur les Technologies de l'Information
							et de la Communication : un site web consultable en ligne et une application
							fonctionnant sur les smartphones android et téléchargeable gratuitement sur
							Google Play ou sur notre site web.
							<a class="close-reveal-modal">&#215;</a>
						</div>
                </div>
            </div>
			<div class="row">
                <div class="large-9 large-centered columns" >
                    <div id="vision" class="reveal-modal">
							<h2>Vision et perspectives</h2>
							Notre vision est de participer à la réduction du nombre de grossesses non désirées
							en milieu scolaire et universitaire à travers la vulgarisation de l'application 
							Family Planning et la conception de nouvelles fonctionnalités capables d'accompagner 
							nos sœurs dans la maitrise du suivi de leur cycle menstruel. A cet effet, nous 
							envisageons ajouter bientôt deux interfaces d'accès à Family Planning : une 
							interface SMS permettant à toute femme de suivre son cycle menstruel à partir de 
							n'importe quel téléphone compatible SMS et permettant ainsi d'échanger des SMS avec
							la plateforme SMS Family Planning, et une application facebook pour simplifier 
							l'utilisation de Family Planning en l'intégrant directement dans la page facebook
							de toute jeune fille le désirant.
							<a class="close-reveal-modal">&#215;</a>
						</div>
                </div>
            </div>
			<div class="row">
                <div class="large-9 large-centered columns" >
                    <div id="contact" class="reveal-modal">
							<h2>Contacts </h2>
							Nos divers contacts et e-mail puis une rubrique « nous écrire » !
							<a class="close-reveal-modal">&#215;</a>
						</div>
                </div>
            </div>
            <div class="row first" id="first">
                <h2>A propos</h2>
                <div class="large-4 columns">
                    <a class="option one" href="#" data-reveal-id="projet">
                        <div class="icone"><img src="images/icone1.png" /></div>
                        <div class="desc">
                            Family planning est un projet né d'un constat amer qui a suscité
							une réponse de la part d'une équipe de quatre jeunes ingénieurs
							Béninois. En effet, il n'est pas rare de voir des élèves ou étudiantes
							des pays africains piquer des grossesses non désirées généralement par
							manque de prudence, par négligence mais surtout par ignorance des...
                        </div>
						
                    </a>
                </div>
                <div class="large-4 columns" >
                    <a class="option two" href="#" data-reveal-id="vision">
                        <div class="icone"><img src="images/icone2.png" /></div>
                        <div class="desc">
                           Notre vision est de participer à la réduction du nombre de grossesses non désirées
							en milieu scolaire et universitaire à travers la vulgarisation de l'application 
							Family Planning et la conception de nouvelles fonctionnalités capables d'accompagner 
							nos sœurs dans la maitrise du suivi de leur cycle menstruel...
                        </div>
                    </a>
                </div>
                <div class="large-4 columns">
                    <a class="option three" href="#" data-reveal-id="contact">
                        <div class="icone"><img src="images/icone3.png" /></div>
                        <div class="desc">
                            Nos divers contacts et e-mail puis une rubrique « nous écrire » !
                        </div>
                    </a>
                </div>
            </div>
            <div class="row " id='second'>
                <h2>Inscription</h2>
                <div class="large-12 columns" >
                    <form action="users-insert-1.html" method="post" onsubmit="return(confirm('Etes-vous sûr des valeurs entrées?'))";>
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
            </div>
            <div id="third">
                <h2>Calendrier</h2>
                <div class="row">
                    <div class="large-12 custom">
                        <div class="custom-calendar-wrap">
                            <div id="custom-inner" class="custom-inner">
                                <div class="custom-header clearfix">
                                    <nav>
                                        <span id="custom-prev" class="custom-prev"></span>
                                        <span id="custom-next" class="custom-next"></span>
                                    </nav>
                                    <h2 id="custom-month" class="custom-month"></h2>
                                    <h3 id="custom-year" class="custom-year"></h3>
                                </div>
                                <div id="calendar" class="fc-calendar-container"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="js/backgroundslideshow/jquery.imagesloaded.min.js"></script>
                <script src="js/backgroundslideshow/cbpBGSlideshow.min.js"></script>
                <script>
                    $(function() {
                        cbpBGSlideshow.init();
                    });
                </script>
                <script type="text/javascript" src="js/calendrio/jquery.calendario.js"></script>
                <script type="text/javascript" src="js/calendrio/data.js"></script>
                <script type="text/javascript">
                    $(function() {
                        var transEndEventNames = {
                            'WebkitTransition': 'webkitTransitionEnd',
                            'MozTransition': 'transitionend',
                            'OTransition': 'oTransitionEnd',
                            'msTransition': 'MSTransitionEnd',
                            'transition': 'transitionend'
                        },
                        transEndEventName = transEndEventNames[ Modernizr.prefixed('transition') ],
                                $wrapper = $('#custom-inner'),
                                $calendar = $('#calendar'),
                                cal = $calendar.calendario({
                            onDayClick: function($el, $contentEl, dateProperties) {

                                if ($contentEl.length > 0) {
                                    showEvents($contentEl, dateProperties);
                                }

                            },
                            caldata: codropsEvents,
                            displayWeekAbbr: true
                        }),
                        $month = $('#custom-month').html(cal.getMonthName()),
                                $year = $('#custom-year').html(cal.getYear());

                        $('#custom-next').on('click', function() {
                            cal.gotoNextMonth(updateMonthYear);
                        });
                        $('#custom-prev').on('click', function() {
                            cal.gotoPreviousMonth(updateMonthYear);
                        });

                        function updateMonthYear() {
                            $month.html(cal.getMonthName());
                            $year.html(cal.getYear());
                        }

                        // just an example..
                        function showEvents($contentEl, dateProperties) {

                            hideEvents();

                            var $events = $('<div id="custom-content-reveal" class="custom-content-reveal"><h4>Events for ' + dateProperties.monthname + ' ' + dateProperties.day + ', ' + dateProperties.year + '</h4></div>'),
                                    $close = $('<span class="custom-content-close"></span>').on('click', hideEvents);

                            $events.append($contentEl.html(), $close).insertAfter($wrapper);

                            setTimeout(function() {
                                $events.css('top', '0%');
                            }, 25);

                        }
                        function hideEvents() {

                            var $events = $('#custom-content-reveal');
                            if ($events.length > 0) {

                                $events.css('top', '100%');
                                Modernizr.csstransitions ? $events.on(transEndEventName, function() {
                                    $(this).remove();
                                }) : $events.remove();

                            }

                        }

                    });
                </script>
            </div>
		</div>