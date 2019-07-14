<?php 
    include "templates/back/dbConfig.php";

    $sql = "SELECT news_id, title, description, sec_name
		           FROM news,sections WHERE news.sec_id = sections.sec_id";
    $result = $conn->prepare($sql);
    $result->execute();
    
    while($row = $result->fetch()) {
        echo <<<PR
            <div class="otherNews out-hidden fl-left full-width">
               <div class="breakingNews"> {$row['sec_name']} </div>

                <div class="otherNewsImg full-width">
                    <img src="images/mbs.jpg" alt="bin-salman"  class="full-width" />
                </div>
                <div class="otherNewsContent out-hidden full-width">
                    <a href="news_details.php?id={$row['news_id']}">
                        <h2 class="newsTitle out-hidden">{$row['title']}</h2>
                    </a>
                    <p>
                        {$row['description']}
                    </p>
                </div>
            </div>
PR;
    }

?>