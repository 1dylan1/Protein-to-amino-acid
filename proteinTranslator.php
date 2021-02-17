<?php

/**
 * An associative array (map) that maps RNA trigrams to
 * protein characters.
 */
$proteinMap = array(
  "AAA" => 'K',
	"AAC" => 'N',
	"AAG" => 'K',
	"AAU" => 'N',
	"ACA" => 'T',
	"ACC" => 'T',
	"ACG" => 'T',
	"ACU" => 'T',
	"AGA" => 'R',
	"AGC" => 'S',
	"AGG" => 'R',
	"AGU" => 'S',
	"AUA" => 'I',
	"AUC" => 'I',
	"AUG" => 'M',
	"AUU" => 'I',
	"CAA" => 'Q',
	"CAC" => 'H',
	"CAG" => 'Q',
	"CAU" => 'H',
	"CCA" => 'P',
	"CCC" => 'P',
	"CCG" => 'P',
	"CCU" => 'P',
	"CGA" => 'R',
	"CGC" => 'R',
	"CGG" => 'R',
	"CGU" => 'R',
	"CUA" => 'L',
	"CUC" => 'L',
	"CUG" => 'L',
	"CUU" => 'L',
	"GAA" => 'E',
	"GAC" => 'D',
	"GAG" => 'E',
	"GAU" => 'D',
	"GCA" => 'A',
	"GCC" => 'A',
	"GCG" => 'A',
	"GCU" => 'A',
	"GGA" => 'G',
	"GGC" => 'G',
	"GGG" => 'G',
	"GGU" => 'G',
	"GUA" => 'V',
	"GUC" => 'V',
	"GUG" => 'V',
	"GUU" => 'V',
	"UAA" => 'x',
	"UAC" => 'Y',
	"UAG" => 'x',
	"UAU" => 'Y',
	"UCA" => 'S',
	"UCC" => 'S',
	"UCG" => 'S',
	"UCU" => 'S',
	"UGA" => 'x',
	"UGC" => 'C',
	"UGG" => 'W',
	"UGU" => 'C',
	"UUA" => 'L',
	"UUC" => 'F',
	"UUG" => 'L',
	"UUU" => 'F',
);


if($argc != 2) {
	printf("[Error] Not enough arguments.\n");
	exit(1);
}
$filePath = $argv[1]; //file path
$remove = ['\n','\t','\r','\v','\f',' '];
$contents = file_get_contents($filePath); //our DNA into a single string
$new_str = str_replace($remove, "", $contents); //removing whitespace
$RNA_str = str_replace("T", "U", $new_str); //change Thymine to Uracil (DNA->RNA)
$codons = str_split($RNA_str, 3); //split it into 3s
print_r($RNA_str);
printf("\n");
print_r($codons);
for($i = 0; $i<count($codons); $i++) {
foreach($proteinMap as $key => $value) {
	if($key == $codons[$i]) {
		if($value != 'x') {
			printf($value);
			if(count($codons) > 15) {
				printf($key);
				printf(" equals ");
				printf($codons[$i]);
				printf(" => protein => ");
				printf($value);
				printf("\n");
			}
		} else {
			exit(0);
		}

	}
}
}
?>
