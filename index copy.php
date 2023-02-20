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

   
    <form class="w-full max-w-sm">
    <div class="mb-3 ml-3 pt-0 space-y-3 ">  
        <label class="text-red-700 font-bold pb-10" for="message">Job description text:</label>
        <textarea placeholder="Copy and paste the job decription here" rows="15" cols="100" name = "jd" class=" resize px-3 py-50 placeholder-slate-300 text-slate-600 relative bg-white bg-white rounded text-base border border-slate-300 outline-none focus:outline-none focus:ring w-full"></textarea>
    </div>

    <div class="mb-3 ml-3 pt-0 space-y-3">  
        <label class="text-red-700 font-bold" for="message">Your resume / CV text:</label>
        <textarea placeholder="Copy and paste the job decription here" rows="15" cols="100" name = "jd" class=" resize px-3 py-50 placeholder-slate-300 text-slate-600 relative bg-white bg-white rounded text-base border border-slate-300 outline-none focus:outline-none focus:ring w-full"></textarea>
    </div>
   
  <div class="md:flex md:items-center">
    <div class="md:w-1/3"></div>
    <div class="md:w-2/3">
      <button class="shadow bg-red-800 hover:bg-red-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
        Analyze match!
      </button>
    </div>
  </div>
</form>



        <?php 

        
            $text = "Collect financial information (e.g. taxes, debts)
            Evaluate creditworthiness and eligibility for obtaining a mortgage loan
            Interview clients 
            Guide clients through mortgage loan options
            Prepare and submit mortgage loan applications
            Ensure data are in line with national and local financial rules
            Monitor and report on application processes
            Inform clients about loan approval or rejection
            Help resolve problems with applications
            Research new mortgage loan policies 
            Ensure compliance with privacy laws and confidentiality policies throughout the process
            Build a supportive referral network (e.g. with clients, lenders, real estate agents)
            Requirements and skills
            Experience as a mortgage loan officer or in a similar role
            Previous experience in sales or customer support is an asset
            Working knowledge of mortgage loan computer software (e.g. Calyx Point)
            Ability to handle confidential information 
            Great mathematical and analytical skills
            Attention to detail 
            Reliability and honesty
            A valid license is a must
            Degree in Finance or Business is a plus";

            $words = str_word_count($text, 1);

            $frequency = array_count_values($words);

            arsort($frequency);

            echo '<pre>';
            print_r($frequency);
            echo '</pre>';

            $paragraph1 = $text;


            $paragraph2 = "Pose hypothetical but job-related scenarios to test candidates’ way of thinking. It’s important to figure whether they take all relevant factors into consideration.
            Make sure you give candidates enough time to come up with an answer. These types of questions usually require thinking through a situation and evaluating given facts.
            “Highly analytical” is often confused with “losing the big picture.” Look for people who can prioritize what’s most important and ignore irrelevant information.
            Candidates who are intrigued by challenges are more likely to effectively manage complex situations on the job. Keep an eye out for candidates who don’t easily quit when faced with problems, even if they can’t immediately find solutions.";

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

            most_frequent_words($text, $stop_words =[], $limit = 10);
            

            ?>

</body>
</html>


