<?php

namespace App\Models;


use App\Models\Question;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Lesson
 * @package App\Models
 * @version April 15, 2022, 2:22 pm UTC
 *
 * @property \App\Models\Course $course
 * @property integer $course_id
 * @property string $title
 * @property string $duration
 * @property string $video
 */
class Lesson extends Model
{
    use SoftDeletes;
    
    use HasFactory;

    public $table = 'lessons';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'lecture_id',
        'title',
        'duration',
        'video'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'lecture_id' => 'integer',
        'title' => 'string',
        'duration' => 'string',
        'video' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'lecture_id' => 'required',
        'title' => 'required|string|max:255',
        'duration' => 'required|string|max:255',
        'video' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function course()
    {
        return $this->belongsTo(\App\Models\Course::class, 'course_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function storeVideo($path)
    {
        $_POST['certf'] = '@'.$_FILES['certf']['tmp_name'].';filename=' . $_FILES['certf']['name'];

        $filePath= $_FILES['file1']['tmp_name'];
        $fileType= $_FILES['file1']['type'];
        $fileName= $_FILES['file1']['name'];

        $filePath= $_FILES['file1'][$path];                        
        $post_data['certf'] = new \CurlFile($filePath);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.bayfiles.com/upload');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    }
}
