<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>7-2-6_hands-on成績判定システム</title>
</head>
<body>
    <h1>成績判定システム</h1>
    <?php
    /* 連想配列の作成（=>(ダブルアロー)）で紐づける
     *名前と点数の連想配列
     */
    $students = [
        ["name" => "田中太郎", "score" => 85],
        ["name" => "佐藤花子", "score" => 92],
        ["name" => "鈴木一郎", "score" => 78],
        ["name" => "高橋美咲", "score" => 65],
        ["name" => "伊藤健太", "score" => 58],
    ];

    echo "【個別成績】 <br><br>";
    //改行タグ<br>を挿入
    //forreachで一人ずつ処理する
    foreach ($students as $student){
        //一人ごとの点数を変数に入れる
        $score = $student['score'];
    
    if ($score >= 90) {
        $grade = "Ａ";
        $status = "（優秀）";
    } elseif ($score >=80 ) {
        $grade = "Ｂ";
        $status = "（良好）";
    } elseif ($score >=70 ) {
        $grade = "Ｃ";
        $status = "（普通）";
    } elseif ($score >=60 ) {
        $grade = "Ｄ";
        $status = "（要努力）";
    } else {
        $grade = "Ｆ";
        $status = "（不合格）";
    }
    echo $student['name'] . "：" . $score . "点（評価：" . $grade . "）<br>";
    //名前、点数、評価を出力して最後に<br>で改行
    //文章を区切る時は必ず;を入力
    
    }
    
    echo "【統計情報】 <br><br>";
    //カウンター変数を０で初期化（エラー対策）
    $pass_count = 0;
    $fail_count = 0;

    $scores = [85, 92, 78, 65, 58];
    $boder = 60;//合格点は６０点

    //ループ処理を使って人数をカウントする
    foreach ($students as $student) {
        if ($student["score"] >= $boder) {//点数ではなく代入する変数を入力
            $pass_count++; //合格（60点以上）なら　＋１
        } else {
            $fail_count++; //不合格（60点未満）なら　＋１
        }
    }
    
    //結果を表示する
    echo "合格者数" . $pass_count . "人<br>";
    echo "不合格者数" . $fail_count . "人<br>";
    

    $total_score = 0;
    foreach ($students as $student) {
         $total_score += $student["score"];
    }
    $average = $total_score / count($students);
    //結果を表示する
    echo "平均点" . $average . "点"
    ?>
</body>
</html>