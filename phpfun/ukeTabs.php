<?php

	// $tabs=[	 'C'		=> '00003', 'C#'		=> '01114', 'Db'		=> '01114'
	// 		,'C7'		=> '00001', 'C#7'		=> '01112', 'Db7'		=> '01112'
	// 		,'Cm'		=> '00333', 'C#m'		=> '01103', 'Dbm'		=> '01103'
	// 		,'Cm7'		=> '03333', 'C#m7'		=> '04444', 'Dbm7'		=> '04444'
	// 		,'Cdim'		=> '02323', 'C#dim'		=> '00101', 'Dbdim'		=> '00101'
	// 		,'Caug'		=> '01003', 'C#aug'		=> '02110', 'Dbaug'		=> '02110'
	// 		,'C6'		=> '00000', 'C#6'		=> '01111', 'Db6'		=> '01111'
	// 		,'CM7'		=> '00002', 'C#M7'		=> '01113', 'DbM7'		=> '01113'
	// 		,'Cmaj7'	=> '00002', 'C#maj7'	=> '01113', 'Dbmaj7'	=> '01113'
	// 		,'C9'		=> '00201', 'C#9'		=> '01312', 'Db9'		=> '01312'

	// 		,'D'		=> '02220', 'D#'		=> '03331', 'Eb'		=> '03331'
	// 		,'D7'		=> '02223', 'D#7'		=> '03334', 'Eb7'		=> '03334'
	// 		,'Dm'		=> '02210', 'D#m'		=> '03321', 'Ebm'		=> '03321'
	// 		,'Dm7'		=> '02213', 'D#m7'		=> '03324', 'Ebm7'		=> '03324'
	// 		,'Ddim'		=> '01212', 'D#dim'		=> '02323', 'Ebdim'		=> '02323'
	// 		,'Daug'		=> '03221', 'D#aug'		=> '02114', 'Ebaug'		=> '02114'
	// 		,'D6'		=> '02222', 'D#6'		=> '03333', 'Eb6'		=> '03333'
	// 		,'DM7'		=> '02224', 'D#M7'		=> '03330', 'EbM7'		=> '03330'
	// 		,'Dmaj7'	=> '02224', 'D#maj7'	=> '03330', 'Ebmaj7'	=> '03330'
	// 		,'D9'		=> '02423', 'D#9'		=> '00333', 'Eb9'		=> '00333'

	// 		,'E'		=> '04442', 'F'			=> '02010', 'F#'		=> '03121'
	// 		,'E7'		=> '01202', 'F7'		=> '02301', 'F#7'		=> '03424'
	// 		,'Em'		=> '00432', 'Fm'		=> '01013', 'F#m'		=> '02120'
	// 		,'Em7'		=> '00202', 'Fm7'		=> '01313', 'F#m7'		=> '02424'
	// 		,'Edim'		=> '00101', 'Fdim'		=> '01212', 'F#dim'		=> '02323'
	// 		,'Eaug'		=> '01003', 'Faug'		=> '02110', 'F#aug'		=> '04322'
	// 		,'E6'		=> '01020', 'F6'		=> '02213', 'F#6'		=> '03324'
	// 		,'EM7'		=> '01302', 'FM7'		=> '02423', 'F#M7'		=> '00111'
	// 		,'Emaj7'	=> '01302', 'Fmaj7'		=> '02423', 'F#maj7'	=> '00111'
	// 		,'E9'		=> '01222', 'F9'		=> '02333', 'F#9'		=> '01101'

	// 		,'Gb'		=> '03121', 'G'			=> '00232', 'G#'		=> '33121'
	// 		,'Gb7'		=> '03424', 'G7'		=> '00212', 'G#7'		=> '01323'
	// 		,'Gbm'		=> '02120', 'Gm'		=> '00231', 'G#m'		=> '01342'
	// 		,'Gbm7'		=> '02424', 'Gm7'		=> '00211', 'G#m7'		=> '00322'
	// 		,'Gbdim'	=> '02323', 'Gdim'		=> '00101', 'G#dim'		=> '01212'
	// 		,'Gbaug'	=> '04322', 'Gaug'		=> '04332', 'G#aug'		=> '01003'
	// 		,'Gb6'		=> '03324', 'G6'		=> '00202', 'G#6'		=> '01313'
	// 		,'GbM7'		=> '00111', 'GM7'		=> '00222', 'G#M7'		=> '01333'
	// 		,'Gbmaj7'	=> '00111', 'Gmaj7'		=> '00222', 'G#maj7'	=> '01333'
	// 		,'Gb9'		=> '01101', 'G9'		=> '02212', 'G#9'		=> '03323'

	// 		,'Ab'		=> '33121', 'A'			=> '02100', 'A#'		=> '03211'
	// 		,'Ab7'		=> '01323', 'A7'		=> '00100', 'A#7'		=> '01211'
	// 		,'Abm'		=> '01342', 'Am'		=> '02000', 'A#m'		=> '03111'
	// 		,'Abm7'		=> '00322', 'Am7'		=> '00433', 'A#m7'		=> '01111'
	// 		,'Abdim'	=> '01212', 'Adim'		=> '02323', 'A#dim'		=> '00101'
	// 		,'Abaug'	=> '01003', 'Aaug'		=> '02114', 'A#aug'		=> '03221'
	// 		,'Ab6'		=> '01313', 'A6'		=> '02424', 'A#6'		=> '00211'
	// 		,'AbM7'		=> '01333', 'AM7'		=> '01100', 'A#M7'		=> '03210'
	// 		,'Abmaj7'	=> '01333', 'Amaj7'		=> '01100', 'A#maj7'	=> '03210'
	// 		,'Ab9'		=> '03323', 'A9'		=> '00102', 'A#9'		=> '01213'

	// 		,'Bb'		=> '03211', 'B'			=> '04322', 'D7#5'		=> '03223'
	// 		,'Bb7'		=> '01211', 'B7'		=> '02322', 'Cm6'		=> '02333'
	// 		,'Bbm'		=> '03111', 'Bm'		=> '04222', 'Dsus4'		=> '00230'
	// 		,'Bbm7'		=> '01111', 'Bm7'		=> '02222', 'A7sus4'	=> '00200'
	// 		,'Bbdim'	=> '00101', 'Bdim'		=> '01212', 'Cadd9'		=> '00203'
	// 		,'Bbaug'	=> '03221', 'Baug'		=> '04332'
	// 		,'Bb6'		=> '00211', 'B6'		=> '01322'
	// 		,'BbM7'		=> '03210', 'BM7'		=> '03322'
	// 		,'Bbmaj7'	=> '03210', 'Bmaj7'		=> '03322'
	// 		,'Bb9'		=> '01213', 'B9'		=> '02324'
	// 		];

	// $chords= ['D       F#m          Bm'
	// 			,'G     D      A      G'
	// 			,'A        Bm      G'
	// 			,'D      A      D C#m7Ab G#'];

	function convertChords($size){
		if(isset($_POST['convert'])) {

			$chords=[];
			array_push($chords, $_POST['chord']);
			
			$chordlist=[];
			for($i=0; $i<sizeof($chords) ;$i++) {
				$chordtemp = preg_split('/\s+/',$chords[$i]);

				for($j=0; $j<sizeof($chordtemp); $j++) {
					array_push($chordlist,ucfirst($chordtemp[$j]));
				} 
			}
			$chordlist=array_unique($chordlist);
			
			// Check if file exists
			$filename = 'json/tabs.json';
			fopen($filename,'a');
			$string = file_get_contents($filename);

			if($string != null) {
				$tabs = json_decode($string, true);
			} else {
				$fp = fopen($filename,'w');
				fwrite($fp, json_encode($tabs,JSON_PRETTY_PRINT));
				fclose($fp);
			}

			foreach($chordlist as $chord) {
				if(isset($tabs[$chord])){
					$pos = substr($tabs[$chord],0,1)	;
					$tab = substr($tabs[$chord],1,4)	;
					echo "<uke-chord class='ukechord' frets='$tab' ";
					if($size=='large'){
						echo "size='L' ";
					}
					echo "position=$pos name='$chord'></uke-chord>";
				}
			}
		}
	};

	function showChords($size,$chords){
		if(isset($_GET['id'])) {
			
			$chordlist=[];
			for($i=0; $i<sizeof($chords) ;$i++) {
				$chordtemp = preg_split('/\s+/',$chords[$i]);

				for($j=0; $j<sizeof($chordtemp); $j++) {
					array_push($chordlist,ucfirst($chordtemp[$j]));
				} 
			}
			$chordlist=array_unique($chordlist);
			
			// Check if file exists
			$filename = 'json/tabs.json';
			fopen($filename,'a');
			$string = file_get_contents($filename);

			if($string != null) {
				$tabs = json_decode($string, true);
			} else {
				$fp = fopen($filename,'w');
				fwrite($fp, json_encode($tabs,JSON_PRETTY_PRINT));
				fclose($fp);
			}

			foreach($chordlist as $chord) {
				if(isset($tabs[$chord])){
					$pos = substr($tabs[$chord],0,1)	;
					$tab = substr($tabs[$chord],1,4)	;
					echo "<uke-chord class='ukechord' frets='$tab' ";
					if($size=='large'){
						echo "size='L' ";
					}
					echo "position=$pos name='$chord'></uke-chord>";
				}
			}
		}
	};
?>