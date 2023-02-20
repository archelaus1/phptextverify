<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>What are we measuring</title>
</head>
<body>
    <h1 class="font-bold text-3xl p-3 text-red-800">Find the match between JD and your resume!</h1>

   
    <form method="POST" class="w-full max-w-sm">
    <div class="mb-3 ml-3 pt-0 space-y-3 ">  
        <label class="text-red-700 font-bold pb-10" for="message">Job description text:</label>
        <textarea placeholder="Copy and paste the job decription here" rows="15" cols="100" name = "jd" class=" resize px-3 py-50 placeholder-slate-300 text-slate-600 relative bg-white bg-white rounded text-base border border-slate-300 outline-none focus:outline-none focus:ring w-full"></textarea>
    </div>

    <div class="mb-3 ml-3 pt-0 space-y-3">  
        <label class="text-red-700 font-bold" for="message">Your resume / CV text:</label>
        <textarea placeholder="Copy and paste your Resume / CV here" rows="15" cols="100" name = "resume" class=" resize px-3 py-50 placeholder-slate-300 text-slate-600 relative bg-white bg-white rounded text-base border border-slate-300 outline-none focus:outline-none focus:ring w-full"></textarea>
    </div>
   
  <div class="md:flex md:items-center">
    <div class="md:w-1/3"></div>
    <div class="md:w-2/3">

    <input type="submit" class="shadow bg-red-800 hover:bg-red-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"value = "Analyze">
      <!-- <button class="shadow bg-red-800 hover:bg-red-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
        Analyze match!
      </button> -->
    </div>
  </div>
</form>



        <?php 

            $paragraph1 = $_POST['jd'];
            $paragraph2 = $_POST['resume'];
        
          
            $words = str_word_count($paragraph1, 1);

            $frequency = array_count_values($words);

            arsort($frequency);

            echo '<pre>';
            print_r($frequency);
            echo '</pre>';

            

            similar_text($paragraph1, $paragraph2, $similarity_percentage);

            echo "The similarity percentage is " . $similarity_percentage;

            echo '<br>';
            

            similar_text($paragraph1, $paragraph2, $similarity_percentage);

            echo "The similarity percentage using levenshtein is " . $similarity_percentage;


            function most_frequent_words($text, $stop_words = [], $limit = 5) {
                $text = strtolower($text); // Make string lowercase
            
                $words = str_word_count($text, 1); // Returns an array containing all the words found inside the string
                $words = array_diff($words, $stop_words); // Remove black-list words from the array
                $words = array_count_values($words); // Count the number of occurrence
            
                arsort($words); // Sort based on count
            
                $most = array_slice($words, 0, $limit); // Limit the number of words and returns the word array

                echo '<pre>';
                print_r($most);
                echo '</pre>';

                
            }

            most_frequent_words($paragraph1, $stop_words =[], $limit = 10);
            

            ?>

</body>
</html>


