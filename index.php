<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/d3-cloud/1.2.5/d3.layout.cloud.min.js" integrity="sha512-HjKxWye8lJGPu5q1u/ZYkHlJrJdm6KGr89E6tOrXeKm1mItb1xusPU8QPcKVhP8F9LjpZT7vsu1Fa+dQywP4eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

    <script src="https://d3js.org/d3.v7.min.js"></script>
    <script src="d3.layout.cloud.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1 class="text-2xl font-bold leading-normal mt-0 mb-2 text-pink-800">
  Check your resume strength
</h1>  

<div class="w-full flex flex-col xl:flex xl:flex-row">

<form method="POST" class="max-w-xl flex flex-col xl:flex-row">
    <div class="w-full mb-3 ml-3 pt-0 space-y-3 xl:flex-row">  
        <label class="text-red-700 font-bold pb-10" for="message">Job description text:</label>
        <textarea placeholder="Copy and paste the job decription here" rows="15" cols="500" name = "jd" class="resize px-3 py-50 placeholder-slate-300 text-slate-600 relative bg-white bg-white rounded text-base border border-slate-300 outline-none focus:outline-none focus:ring w-full"></textarea>
    </div>

    <div class="w-full mb-3 ml-3 pt-0 space-y-3 xl:flex-row">  
        <label class="text-red-700 font-bold" for="message">Your resume / CV text:</label>
        <textarea placeholder="Copy and paste your Resume / CV here" rows="15" cols="500" name = "resume" class="resize px-3 py-50 placeholder-slate-300 text-slate-600 relative bg-white bg-white rounded text-base border border-slate-300 outline-none focus:outline-none focus:ring w-full"></textarea>
    </div>
   
  <div class="md:flex md:items-center flex">
    <div class="md:w-1/3"></div>
    <div class="md:w-2/3">

    <input type="submit" class="shadow bg-red-800 hover:bg-red-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"value = "Analyze">
      <!-- <button class="shadow bg-red-800 hover:bg-red-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
        Analyze match!
      </button> -->
    </div>
  </div>
</form>
</div>



<?php

$paragraph1 = $_POST['jd'];

$paragraph2 = $_POST['resume'];


$stop_words = array("0o", "0s", "3a", "3b", "3d", "6b", "6o", "a", "a1", "a2", "a3", "a4", "ab", "able", "about", "above", "abst", "ac", "accordance", "according", "accordingly", "across", "act", "actually", "ad", "added", "adj", "ae", "af", "affected", "affecting", "affects", "after", "afterwards", "ag", "again", "against", "ah", "ain", "ain't", "aj", "al", "all", "allow", "allows", "almost", "alone", "along", "already", "also", "although", "always", "am", "among", "amongst", "amoungst", "amount", "an", "and", "announce", "another", "any", "anybody", "anyhow", "anymore", "anyone", "anything", "anyway", "anyways", "anywhere", "ao", "ap", "apart", "apparently", "appear", "appreciate", "appropriate", "approximately", "ar", "are", "aren", "arent", "aren't", "arise", "around", "as", "a's", "aside", "ask", "asking", "associated", "at", "au", "auth", "av", "available", "aw", "away", "awfully", "ax", "ay", "az", "b", "b1", "b2", "b3", "ba", "back", "bc", "bd", "be", "became", "because", "become", "becomes", "becoming", "been", "before", "beforehand", "begin", "beginning", "beginnings", "begins", "behind", "being", "believe", "below", "beside", "besides", "best", "better", "between", "beyond", "bi", "bill", "biol", "bj", "bk", "bl", "bn", "both", "bottom", "bp", "br", "brief", "briefly", "bs", "bt", "bu", "but", "bx", "by", "c", "c1", "c2", "c3", "ca", "call", "came", "can", "candidate", "candidates", "candidates’", "cannot", "cant", "can't", "cause", "causes", "cc", "cd", "ce", "certain", "certainly", "cf", "cg", "ch", "changes", "ci", "cit", "cj", "cl", "clearly", "cm", "c'mon", "cn", "co", "com", "come", "comes", "con", "concerning", "consequently", "consider", "considering", "contain", "containing", "contains", "corresponding", "could", "couldn", "couldnt", "couldn't", "course", "cp", "cq", "cr", "cry", "cs", "c's", "ct", "cu", "currently", "cv", "cx", "cy", "cz", "d", "d2", "da", "date", "dc", "dd", "de", "definitely", "describe", "described", "despite", "detail", "df", "di", "did", "didn", "didn't", "different", "dj", "dk", "dl", "do", "does", "doesn", "doesn't", "doing", "don", "done", "don't", "down", "downwards", "dp", "dr", "ds", "dt", "du", "due", "during", "dx", "dy", "e", "e2", "e3", "ea", "each", "ec", "ed", "edu", "ee", "ef", "effect", "eg", "e.g", "e.g.", "ei", "eight", "eighty", "either", "ej", "el", "eleven", "else", "elsewhere", "em", "empty", "en", "end", "ending", "enough", "entirely", "eo", "ep", "eq", "er", "es", "especially", "est", "et", "et-al", "etc", "eu", "ev", "even", "ever", "every", "everybody", "everyone", "everything", "everywhere", "ex", "exactly", "example", "except", "ey", "f", "f2", "fa", "far", "fc", "few", "ff", "fi", "fifteen", "fifth", "fify", "fill", "find", "fire", "first", "five", "fix", "fj", "fl", "fn", "fo", "followed", "following", "follows", "for", "former", "formerly", "forth", "forty", "found", "four", "fr", "from", "front", "fs", "ft", "fu", "full", "further", "furthermore", "fy", "g", "ga", "gave", "ge", "get", "gets", "getting", "gi", "give", "given", "gives", "giving", "gj", "gl", "go", "goes", "going", "gone", "got", "gotten", "gr", "greetings", "gs", "gy", "h", "h2", "h3", "had", "hadn", "hadn't", "happens", "hardly", "has", "hasn", "hasnt", "hasn't", "have", "haven", "haven't", "having", "he", "hed", "he'd", "he'll", "hello", "help", "hence", "her", "here", "hereafter", "hereby", "herein", "heres", "here's", "hereupon", "hers", "herself", "hes", "he's", "hh", "hi", "hid", "him", "himself", "his", "hither", "hj", "ho", "home", "hopefully", "how", "howbeit", "however", "how's", "hr", "hs", "http", "hu", "hundred", "hy", "i", "i2", "i3", "i4", "i6", "i7", "i8", "ia", "ib", "ibid", "ic", "id", "i'd", "ie", "if", "ig", "ignored", "ih", "ii", "ij", "il", "i'll", "im", "i'm", "immediate", "immediately", "importance", "important", "in", "inasmuch", "inc", "indeed", "index", "indicate", "indicated", "indicates", "information", "inner", "insofar", "instead", "interest", "into", "invention", "inward", "io", "ip", "iq", "ir", "is", "isn", "isn't", "it", "itd", "it'd", "it'll", "its", "it's", "itself", "iv", "i've", "ix", "iy", "iz", "j", "job", "jobs", "jj", "jr", "js", "jt", "ju", "just", "k", "ke", "keep", "keeps", "kept", "kg", "kj", "km", "know", "known", "knows", "ko", "l", "l2", "la", "largely", "last", "lately", "later", "latter", "latterly", "lb", "lc", "le", "least", "les", "less", "lest", "let", "lets", "let's", "lf", "like", "liked", "likely", "line", "little", "lj", "ll", "ll", "ln", "lo", "look", "looking", "looks", "los", "lr", "ls", "lt", "ltd", "m", "m2", "ma", "made", "mainly", "make", "makes", "many", "may", "maybe", "me", "mean", "means", "meantime", "meanwhile", "merely", "mg", "might", "mightn", "mightn't", "mill", "million", "mine", "miss", "ml", "mn", "mo", "more", "moreover", "most", "mostly", "move", "mr", "mrs", "ms", "mt", "mu", "much", "mug", "must", "mustn", "mustn't", "my", "myself", "n", "n2", "na", "name", "namely", "nay", "nc", "nd", "ne", "near", "nearly", "necessarily", "necessary", "need", "needn", "needn't", "needs", "neither", "never", "nevertheless", "new", "next", "ng", "ni", "nine", "ninety", "nj", "nl", "nn", "no", "nobody", "non", "none", "nonetheless", "noone", "nor", "normally", "nos", "not", "noted", "nothing", "novel", "now", "nowhere", "nr", "ns", "nt", "number", "ny", "o", "oa", "ob", "obtain", "obtained", "obviously", "oc", "od", "of", "off", "often", "og", "oh", "oi", "oj", "ok", "okay", "ol", "old", "om", "omitted", "on", "once", "one", "ones", "only", "onto", "oo", "op", "oq", "or", "ord", "os", "ot", "other", "others", "otherwise", "ou", "ought", "our", "ours", "ourselves", "out", "outside", "over", "overall", "ow", "owing", "own", "ox", "oz", "p", "p1", "p2", "p3", "page", "pagecount", "pages", "par", "part", "particular", "particularly", "pas", "past", "pc", "pd", "pe", "per", "perhaps", "pf", "ph", "pi", "pj", "pk", "pl", "placed", "please", "plus", "pm", "pn", "po", "poorly", "possible", "possibly", "potentially", "pp", "pq", "pr", "predominantly", "present", "presumably", "previously", "primarily", "probably", "promptly", "proud", "provides", "ps", "pt", "pu", "put", "py", "q", "qj", "qu", "qualified", "que", "quickly", "quite", "qv", "r", "r2", "ra", "ran", "rather", "rc", "rd", "re", "readily", "really", "reasonably", "recent", "recruiters", "recruitment", "recruitments", "recently", "ref", "refs", "regarding", "regardless", "regards", "related", "relatively", "research", "research-articl", "respectively", "resulted", "resulting", "results", "rf", "rh", "ri", "right", "rj", "rl", "rm", "rn", "ro", "rq", "rr", "rs", "rt", "ru", "run", "rv", "ry", "s", "s2", "sa", "said", "same", "saw", "say", "saying", "says", "sc", "sd", "se", "sec", "second", "secondly", "section", "see", "seeing", "seem", "seemed", "seeming", "seems", "seen", "self", "selves", "sensible", "sent", "serious", "seriously", "seven", "several", "sf", "shall", "shan", "shan't", "she", "shed", "she'd", "she'll", "shes", "she's", "should", "shouldn", "shouldn't", "should've", "show", "showed", "shown", "showns", "shows", "si", "side", "significant", "significantly", "similar", "similarly", "since", "sincere", "six", "sixty", "sj", "sl", "slightly", "sm", "sn", "so", "some", "somebody", "somehow", "someone", "somethan", "something", "sometime", "sometimes", "somewhat", "somewhere", "soon", "sorry", "sp", "specifically", "specified", "specify", "specifying", "sq", "sr", "ss", "st", "still", "stop", "strongly", "sub", "substantially", "successfully", "such", "sufficiently", "suggest", "sup", "sure", "sy", "system", "sz", "t", "t1", "t2", "t3", "take", "taken", "taking", "tb", "tc", "td", "te", "tell", "ten", "tends", "tf", "th", "than", "thank", "thanks", "thanx", "that", "that'll", "thats", "that's", "that've", "the", "their", "theirs", "them", "themselves", "then", "thence", "there", "thereafter", "thereby", "thered", "therefore", "therein", "there'll", "thereof", "therere", "theres", "there's", "thereto", "thereupon", "there've", "these", "they", "theyd", "they'd", "they'll", "theyre", "they're", "they've", "thickv", "thin", "think", "third", "this", "thorough", "thoroughly", "those", "thou", "though", "thoughh", "thousand", "three", "throug", "through", "throughout", "thru", "thus", "ti", "til", "tip", "tj", "tl", "tm", "tn", "to", "together", "too", "took", "top", "toward", "towards", "tp", "tq", "tr", "tried", "tries", "truly", "try", "trying", "ts", "t's", "tt", "tv", "twelve", "twenty", "twice", "two", "tx", "u", "u201d", "ue", "ui", "uj", "uk", "um", "un", "under", "unfortunately", "unless", "unlike", "unlikely", "until", "unto", "uo", "up", "upon", "ups", "ur", "us", "use", "used", "useful", "usefully", "usefulness", "uses", "using", "usually", "ut", "v", "va", "value", "various", "vd", "ve", "ve", "very", "via", "viz", "vj", "vo", "vol", "vols", "volumtype", "vq", "vs", "vt", "vu", "w", "wa", "want", "wants", "was", "wasn", "wasnt", "wasn't", "way", "we", "wed", "we'd", "welcome", "well", "we'll", "well-b", "went", "were", "we're", "weren", "werent", "weren't", "we've", "what", "whatever", "what'll", "whats", "what's", "when", "whence", "whenever", "when's", "where", "whereafter", "whereas", "whereby", "wherein", "wheres", "where's", "whereupon", "wherever", "whether", "which", "while", "whim", "whither", "who", "whod", "whoever", "whole", "who'll", "whom", "whomever", "whos", "who's", "whose", "why", "why's", "wi", "widely", "will", "willing", "wish", "with", "within", "without", "wo", "won", "wonder", "wont", "won't", "words", "world", "would", "wouldn", "wouldnt", "wouldn't", "www", "x", "x1", "x2", "x3", "xf", "xi", "xj", "xk", "xl", "xn", "xo", "xs", "xt", "xv", "xx", "y", "y2", "yes", "yet", "yj", "yl", "you", "youd", "you'd", "you'll", "your", "youre", "you're", "yours", "yourself", "yourselves", "you've", "yr", "ys", "yt", "z", "zero", "zi", "zz");

// Split each para into an array
      


$words1 = explode(" ", $paragraph1);
$words1 = array_map("strtolower", $words1);
$words1 = array_diff($words1, $stop_words);


$words2 = explode(" ", $paragraph2);
$words2 = array_map("strtolower", $words2);
$words2 = array_diff($words2, $stop_words);

// Remove punctuation and convert to lowercase

$words1 = array_map(function ($word) {
    return preg_replace("/[^a-zA-Z0-9]+/", "", $word);
}, $words1);

$words2 = array_map(function ($word) {
    return preg_replace("/[^a-zA-Z0-9]+/", "", $word);
}, $words2);


// check if jd words are in resume

$similar_words = array();
foreach ($words1 as $word) {
    if (in_array($word, $words2)) {
        $similar_words[] = $word;
    }
}

if (count($similar_words) > 0) {
    echo '<h5 class="text-xl font-normal leading-normal mt-0 mb-2 text-pink-800">
    Good job - you have these words matching. 
  </h5>';

    echo implode(", ", $similar_words);
    echo '<br>';
    echo '<br>';
} else {
    echo '<h5 class="text-xl font-normal leading-normal mt-0 mb-2 text-pink-800"> Your resume isn\'t a great fit. Consider revising. </h5>';
    echo '<br>';
    echo '<br>';
}

$unique_words = array_unique(array_merge($words1, $words2));
$total_words = count($unique_words);

$similar_words_count = count($similar_words);
$similar_words_percentage = ($similar_words_count / $total_words) * 100;

echo "The percentage of words that exist in both paragraphs is (Liberal): " . ceil($similar_words_percentage) . "%";
echo '<br>';
echo '<br>';

$total_words_count = count($words1);
$similar_words_count = 0;

foreach ($unique_words as $word) {
    $count1 = array_count_values($words1)[$word] ?? 0;
    $count2 = array_count_values($words2)[$word] ?? 0;
    $similar_words_count += min($count1, $count2);
}

$similar_words_percentage_liberal = ($similar_words_count / $total_words_count) * 100;

echo "The percentage of words from second para (resume) that exist in first para (JD) is (Tough ATS): " . ceil($similar_words_percentage_liberal) . "%";
echo '<br>';
echo '<br>';

// $completed = $similar_words_percentage;


// Find the missing words

$word_count = array();
foreach ($words1 as $word) {
  if (!isset($word_count[$word])) {
    $word_count[$word] = 1;
  } else {
    $word_count[$word]++;
  }
}

$words2 = array_map(function ($word) {
    return preg_replace("/[^a-zA-Z0-9]+/", "", $word);
  }, $words2);

$words2 = array_map("strtolower", $words2);

$missing_words = array();
foreach ($word_count as $word => $count) {
  if (!in_array($word, $words2)) {
    $missing_words[$word] = $count;
  }
}

arsort($missing_words);

$top_missing_words = array_slice($missing_words, 0, 10);

echo '<h3 class="text-2xl font-normal leading-normal mt-0 mb-2 text-pink-800">
Consider adding these competencies to your resume (Top words missing in resume)
</h3>';


echo '<br>';
echo '<br>';

print_r( $top_missing_words);

// getting words ready for word cloud 

function stringToWordCloudData($str) {
    // Convert the string to lowercase and remove all non-word characters
    $str = preg_replace('/[^\w\s]+/', '', strtolower($str));
  
    // Split the string into an array of words
    $words = str_word_count($str, 1);
  
    // Count the frequency of each word
    $freq = array_count_values($words);
  
    // Convert the associative array to an array of objects
    $data = array();
    foreach ($freq as $word => $frequency) {
      $obj = array('word' => $word, 'frequency' => $frequency);
      array_push($data, $obj);
    }
  
    return $data;
  }


  stringToWordCloudData($paragraph1);
  echo '<br>';
  echo '<br>';

  stringToWordCloudData($paragraph2);




// Remaining 
// Remove stop words - done
// Show a word cloud
// Throw suggested words to include in the resume - done
// convert everything into a function


?>

<div>
<canvas id="myChart"></canvas>
</div> 

<div>
<div id="wordcloud"></div>
</div>

<script>
    
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Matched', 'Uunmatched'],
        datasets: [{
            data: [75, 25],
            backgroundColor: [
                '#36A2EB',
                '#FFCE56'
            ]
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            position: 'bottom'
        },
        animation: {
            animateScale: true
        },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index] + '%';
                }
            }
        }
    }
});

myChart.data.datasets[0].data[0] = <?php echo $similar_words_percentage; ?>;
myChart.data.datasets[0].data[1] = 100 - <?php echo $similar_words_percentage; ?>;
myChart.update();

function generateWordCloud(data) {
  var layout = d3.layout.cloud()
    .size([800, 400])
    .words(data.map(function(d) {
      return {text: d.word, size: d.frequency};
    }))
    .padding(5)
    .rotate(function() { return ~~(Math.random() * 2) * 90; })
    .font("Impact")
    .fontSize(function(d) { return d.size; })
    .on("end", draw);

  layout.start();

  function draw(words) {
    d3.select("#wordcloud").append("svg")
      .attr("width", layout.size()[0])
      .attr("height", layout.size()[1])
      .append("g")
      .attr("transform", "translate(" + layout.size()[0] / 2 + "," + layout.size()[1] / 2 + ")")
      .selectAll("text")
      .data(words)
      .enter().append("text")
      .style("font-size", function(d) { return d.size + "px"; })
      .style("font-family", "Impact")
      .style("fill", function(d, i) { return d3.schemeCategory10[i % 10]; })
      .attr("text-anchor", "middle")
      .attr("transform", function(d) {
        return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
      })
      .text(function(d) { return d.text; });
  }
}

// This needs to be dynamically generated

// We can multiply the frequencies by 20

var data = [
  {word: "alteryx", frequency: 100},
  {word: "tableau", frequency: 50},
  {word: "powerbi", frequency: 150},
  {word: "sql", frequency: 130},
  {word: "python", frequency: 70}
];

generateWordCloud(data);





    
</script>


<!-- <script src="../textVerify/script.js"></script> -->
</body>


</html>
