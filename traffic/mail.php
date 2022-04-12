<?php
include 'bot-trap/bottrap.php';
$page = $_GET['page'];
function insult() {
	$adjective_one = array(
		'artless',
		'bawdy',
		'beslubbering',
		'bootless',
		'churlish',
		'craven',
		'currish',
		'dankish',
		'dissembling',
		'droning',
		'errant',
		'fawning',
		'fobbing',
		'froward',
		'frothy',
		'gleeking',
		'goatish',
		'impertinent',
		'infectious',
		'jarring',
		'lumpish',
		'mammering',
		'mewling',
		'paunchy',
		'pribbling',
		'puking',
		'puny',
		'qualling',
		'rank',
		'reeky',
		'roguish',
		'ruttish',
		'saucy',
		'spleeny',
		'spongy',
		'surly',
		'tottering',
		'vain',
		'villainous',
		'warped',
		'wayward',
		'weedy',
		'yeasty',
		'spotty',
		'hypocrtitical',
		'whining',
		'stinking',
		'blind',
		'stinky',
		'farty',
		'vacuous',
		'loathsome',
		'lousy',
		'tinny',
		'non-binary',		
		'stupid',
		'naughty'		
   );
	$adjective_two = array(
		'bat-fowling',
		'cockered',
		'clouted',
		'gorbellied',
		'mangled',
		'unmuzzled',
		'simple minded',
		'libtarded',
		'cheese-toothed',		
		'pinheaded',
		'idle-headed',
		'loggerheaded',
		'beef-witted',
		'beetle-headed',
		'boil-brained',
		'clapper-clawed',
		'clay-brained',
		'donkey fucking',
		'crook-pated',
		'dismal-dreaming',
		'anal bifida having',
		'dizzy-eyed',
		'doghearted',
		'dread-bolted',
		'suck-fucking',
		'earth-vexing',
		'elf-skinned',
		'fat-kidneyed',
		'fen-sucked',
		'flap-mouthed',
		'fly-bitten',
		'folly-fallen',
		'fool-born',
		'full-gorged',
		'guts-griping',
		'half-faced',
		'hasty-witted',
		'butt-darts playing',
		'hedge-born',
		'hell-hated',
		'ill begotten',
		'ill-breeding',
		'ill-nurtured',
		'knotty-pated',
		'milk-livered',
		'motley-minded',
		'onion-eyed',
		'plume-plucked',
		'pottle-deep',
		'pox-marked',
		'reeling-ripe',
		'rough-hewn',
		'rude-growing',
		'rump-fed',
		'shard-borne',
		'sheep-biting',
		'spur-galled',
		'swag-bellied',
		'tardy-gaited',
		'tickle-brained',
		'toad-spotted',
		'unchin-snouted',
		'weather-bitten',
		'boil-dripping',
		'beefy',
		'fart-sniffing',
		'slug-slimed',
		'two-toned',
		'zebra-headed',
		'slime-coated',
		'pimple-farmin\'',
		'paramecium-brained',	
		'contrarian',
		'smelly',
		'toilet-breathed',
		'gregarious',
		'scab-picked',
		'pimple-squeezing',
		'cheesy',
		'mung tongue',
		'camel-cake',
		'lying, crying, spying, prying',
		'semen slurping',
		'ball tickling',
		'enema loving',
		'empty-headed',
		'malodorous',
		'snotty-faced',
		'philistine',
		'blackballing',
		'bleeding',
		'so-called',
		'festering',	
		'elderberry-smelling',
		'coffee-nosed',
		'non-creative',
		'soiled panties sniffing',
		'anal-dwelling',
		'fecal frolicking',
		'clap infected', 
		'crab infested', 
		'piss swilling', 
		'septic swimming', 
		'shit splattered', 
		'needle dicked',
		'shit stained',		
	);
	$noun = array(
		'baggage',
		'barnacle',
		'bladder',
		'boar-pig',
		'bugbear',
		'bum-bailey',
		'canker-blossom',
		'clack-dish',
		'clotpole',
		'coxcomb',
		'codpiece',
		'death-token',
		'dewberry',
		'flap-dragon',
		'flax-wench',
		'douche with a face like a hatful of assholes',
		'foot-licker',
		'fustilarian',
		'giglet',
		'gudgeon',
		'haggard',
		'harpy',
		'hedge-pig',
		'horn-beast',
		'cock juggling thunder cunt',
		'fuck puppet',
		'lewdster',
		'lout',
		'maggot-pie',
		'malt-worm',
		'penis wrinkle. your mother should have swallowed you.',
		'measle',
		'minnow',
		'miscreant',
		'moldwarp',
		'mumble-news',
		'nut-hook',
		'pigeon-egg',
		'pignut',
		'puttock',
		'pumpion',
		'ratsbane',
		'scut',
		'skainsmate',
		'strumpet',
		'ill-conceived piece of gene pool pollution',
		'vassal',
		'whey-face',
		'wagtail',
		'cum guzzling gutter slut',
		'fuck head',
		'fuck-sucker',
		'ass-hat',
		'jerk',
		'ass-captain',
		'ass',
		'pig',
		'dick',
		'butt-burglar',
		'turd-burglar',
		'clack-dish',
		'fart-biscuit',
		'lawyer',
		'fuckwaffle',
		'bubble-butt',
		'fart factory',
		'sack of rat guts in cat vomit',
		'finger bandage',
		'week old maggot burger with everything on it and flies on the side',
		'substitute chemistry teacher',
		'math tutor',
		'prison barber',
		'near-sighted gynecologist',
		'ultra-pig',
		'lewd, crude, rude, bag of pre-chewed food dude',
		'maggot burger',
		'lawyer',
		'animal food trough wiper',
		'hamster',
		'English pig-dog',
		'son of a motherless goat',
		'heap of parrot droppings',
		'pervert',
		'git',
		'garbage',
		'excrement',
		'cum dumpster',
		'bignose',
		'bat',
		'private part',
		'dickweed',
		'dick head',
		'fart knocker',
		'dirty little twerp',
		'mouth breather',
		'sack of dog farts',
		'walking arguement for postnatal abortion',
		'week old dingleberry stuck in a fat man\'s ass hair',
		'butt pirate',
		'rump ranger',
		'chicken-shit weeny head',
		'fuck-stick',
		'twittard',
		'flea infested dog\'s ass',
		'shithead',
		'pig fucker',
		'uncle fucker',
		'sheep fucker',
		'donkey fucker',
		'ingrown ass hair',
		'ass pimple',
		'twatwaffle',
		'sack of calf fries',
		'turd nugget',
		'cow patty',
		'hamster fucker',
		'spawn of a meth mouthed hooker',
		'livestock rapist',
		'taint rash',
		'infected jock itch',
		'piss stain',
		'testical boil',
		'whore spawn',
		'anal polyp', 
		'fuck stain',
		'anal bead',
	);


	$insult = array(
		$adjective_one[mt_rand( 0, count( $adjective_one ) - 1 )],
		$adjective_two[mt_rand( 0, count( $adjective_two ) - 1 )],
		$noun[mt_rand( 0, count( $noun ) - 1 )],
	);

	$insult = implode( ' ', $insult );
		$insult = 'you ' . $insult;
	return $insult;
}

?>
<!DOCTYPE html>
<style>
body {
	margin-left:auto;
	margin-right:auto;
	background:#000;
	color:#fff;
}

.text_box_style {
	margin:10px 0px 10px 10px;
	width:280px;
	height:30px;
	text-align:center;
	border-radius:15px;
	vertical-align:middle;	
	-webkit-box-shadow: inset 10px 10px 5px -8px rgba(0,0,0,0.75);
	-moz-box-shadow: inset 10px 10px 5px -8px rgba(0,0,0,0.75);
	box-shadow: inset 10px 10px 5px -8px rgba(0,0,0,0.75);
}

.textbox_med {
	width:100px;
	border-radius:15px;
	margin:10px 0px 10px 10px;
	text-align:center;	
	vertical-align:middle;
	-webkit-box-shadow: inset 10px 10px 5px -8px rgba(0,0,0,0.75);
	-moz-box-shadow: inset 10px 10px 5px -8px rgba(0,0,0,0.75);
	box-shadow: inset 10px 10px 5px -8px rgba(0,0,0,0.75);	
}

.textbox_sm {
	width:40px;
	border-radius:10px;
	margin:10px 0px 10px 10px;
	text-align:center;	
	vertical-align:middle;
	-webkit-box-shadow: inset 0px 0px 70px -6px rgba(0,0,0,0.75);
	-moz-box-shadow: inset 0px 0px 70px -6px rgba(0,0,0,0.75);
	box-shadow: inset 0px 0px 70px -6px rgba(0,0,0,0.75);
}

.small-text {
	padding-top:20px;
	margin:10px 0px 10px 10px;
	text-align:center;
	border-radius:15px;
	height:10em;
	width:20em;	
	-webkit-box-shadow: inset 0px 0px 70px -6px rgba(0,0,0,0.75);
	-moz-box-shadow: inset 0px 0px 70px -6px rgba(0,0,0,0.75);
	box-shadow: inset 0px 0px 70px -6px rgba(0,0,0,0.75);
}

.medium-text {
	padding-top:20px;
	margin:10px 0px 10px 10px;
	text-align:center;
	border-radius:15px;
	height:15em;
	width:20em;
	-webkit-box-shadow: inset 0px 0px 70px -6px rgba(0,0,0,0.75);
	-moz-box-shadow: inset 0px 0px 70px -6px rgba(0,0,0,0.75);
	box-shadow: inset 0px 0px 70px -6px rgba(0,0,0,0.75);
}

.large-text {
	padding-top:20px;
	margin:10px 0px 10px 10px;
	text-align:center;
	border-radius:15px;
	height:30em;
	width:40em;	
	-webkit-box-shadow: inset 0px 0px 70px -6px rgba(0,0,0,0.75);
	-moz-box-shadow: inset 0px 0px 70px -6px rgba(0,0,0,0.75);
	box-shadow: inset 0px 0px 70px -6px rgba(0,0,0,0.75);
}

.btn-lrg {
	width: 90px;
	/* Background color and gradients */	
	background: rgb(2,114,167);
	background: -moz-linear-gradient(top, rgba(2,114,167,1) 0%, rgba(2,50,73,1) 100%); 
	background: -webkit-linear-gradient(top, rgba(2,114,167,1) 0%,rgba(2,50,73,1) 100%);
	background: linear-gradient(to bottom, rgba(2,114,167,1) 0%,rgba(2,50,73,1) 100%); 
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0272a7', endColorstr='#023249',GradientType=0 );
	color:#fbcb49;	
	padding:2px 4px 2px 4px;
	margin:4px auto 4px auto;
	text-align:center;
	/* Borders */
	border: 1px inset #fff;
	border-radius:20px;
	height: 30px;
}

</style>
<html>
	<head>
		<title>Kaos Email Spoofer/Spammer</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="bot-trap/css/bottrap.css" media="all">	
		
	</head>
	<body style="margin-left:40px;">
		<form action="mail.php?page=mail" method="post">
			<h2>Kaos Email Spoofer/Spammer</h2>
			<p><em></em></p>
			<table style="margin-bottom:15px;">
				<tr>
					<td>Number of Emails to send:</td>
					<td><input style="width:140px;" class="puzzle_box" type="number" min="1" max="9999" name="sendNum" required /></td>
				</tr>
				<tr>
					<td>To address:</td>
					<td><input class="puzzle_box" type="text" name="sendTo" /></td>
				</tr>
				<tr>
					<td>From Address (Blank For Random):</td>
					<td><input class="puzzle_box" type="email" name="sendFrom" /></td>
				</tr>	
				<tr>
					<td>Subject:</td>
					<td><input class="puzzle_box" type="text" name="subject" /></td>
				</tr>	
				<tr>
					<td>Message (Blank for Random):</td>
					<td><textarea class="medium-text" name="message"></textarea></td>
				</tr>
				<tr>
					<td><button class="btn-lrg" type="submit" name="submit" title="It clicks the button to sends the precious.">Send!</button></td>
				</tr>
					
			</table>
			<?php // bottrap(); ?>
		</form>
	</body>
</html>	
<?php
	switch ($page){
		case 'mail';
				if (!empty($_POST)) {
//  <===== CHECK TO SEE IF JOHNNY 5 IS ALIVE ====> //
					if (isset($_POST['johnnytest']) && $_POST['johnnytest'] != '') {
						$spambot_ip = $_SERVER['REMOTE_ADDR'];
						$file = 'logs/johnnies.lst';
						$file2 = '../.htaccess';
						$deny = 'deny from ' . $spambot_ip . ' ## JOHNNY 5 ALIVE Bot Traptcha Auto Block';
						file_put_contents($file2, $deny. "\n", FILE_APPEND | LOCK_EX);
						file_put_contents($file, $spambot_ip. "\n", FILE_APPEND | LOCK_EX);
						die ('We dont care what bots have to say');
						}	
//  <===== END JOHNNY 5 CHECK ====> //


			   }
	
			$counter = 0;
			$sendNum = $_POST['sendNum'];
			$sentNum = 0;
			function generateRandomString($length = 9254) {
				$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$charactersLength = strlen($characters);
				$randomString = '';
				for ($i = 0; $i < $length; $i++) {
					$randomString .= $characters[rand(0, $charactersLength - 1)];
				}
				return $randomString;
			}

			function generateRandomUsr($Usrlength = 7) {
				$characters = '0123456789';
				$charactersLength = strlen($characters);
				$randomUsr = '';
				for ($i = 0; $i < $Usrlength; $i++) {
					$randomUsr .= $characters[rand(0, $charactersLength - 1)];
				}
				return $randomUsr;
			}

			function generateRandomServer($Srvrlength = 10) {
				$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$charactersLength = strlen($characters);
				$randomServer = '';
				for ($i = 0; $i < $Srvrlength; $i++) {
					$randomServer .= $characters[rand(0, $charactersLength - 1)];
				}
				return $randomServer;
			}

			while ($sentNum < $sendNum) {
			$sentNum = $sentNum + 1;
			$ins = insult();
			$addy = $_POST['sendTo'];
			$to = $addy;
			$subject = $_POST['subject'];
			if ($_POST['message'] == "") {
				$message = generateRandomString();
			} else {
				$message = $_POST['message']; 
			}	
	//		if (!empty($_POST['message'])) $message = $ins;
			//$message ="Mr. Langan, since you are well past our scheduled appointment time, it is clear that you have no intention of coming.  I trust that this will see an end to your criminal conduct.  Have a great day.";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			if ($_POST['sendFrom'] == "") {
				$headers .= 'From: <423'.generateRandomUsr().'@messaging.sprintpcs.com>' . "\r\n";
			} else {
				$headers .= 'From: <'.$_POST['sendFrom'].'>' . "\r\n";
			}
//			die($headers);
			mail($to,$subject,$message,$headers);

			}
			echo '<p>Done.  I successfully sent: ' .$sentNum. ' Email(s) to: ' .$addy.'</p>';
		break;
	}
?>
<br />
<br />
<br />