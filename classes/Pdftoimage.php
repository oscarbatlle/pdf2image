<?php

/**
 * @author Oscar Batlle <oscarbatlle@gmail.com>
 */
class Pdftoimage {

    public function getPDFPages($file)
    {
        if (file_exists($file))
        {
            //open the file for reading
            if ($handle = @fopen($file, "rb"))
            {
                $count = 0;
                $i = 0;
                while (!feof($handle))
                {
                    if ($i > 0)
                    {
                        $contents .= fread($handle, 8152);
                    } else
                    {
                        $contents = fread($handle, 1000);
                        //In some pdf files, there is an N tag containing the number of
                        //of pages. This doesn't seem to be a result of the PDF version.
                        //Saves reading the whole file.
                        if (preg_match("/\/N\s+([0-9]+)/", $contents, $found))
                        {
                            return $found[1];
                        }
                    }
                    $i++;
                }
                fclose($handle);

                //get all the trees with 'pages' and 'count'. the biggest number
                //is the total number of pages, if we couldn't find the /N switch above.
                if (preg_match_all("/\/Type\s*\/Pages\s*.*\s*\/Count\s+([0-9]+)/", $contents, $capture, PREG_SET_ORDER))
                {
                    foreach ($capture as $c)
                    {
                        if ($c[1] > $count)
                            $count = $c[1];
                    }

                    return $count;
                }
            }
        }
    }

    public function pdf2image($len, $file)
    {
        $arr = explode(' ',trim($file));
        $filename = basename($arr[0], ".pdf"); // Get the filename without .pdf extension
        for ($i = 0; $i <= $len - 1; $i++)
        {
            $im = new imagick("$file" . "[$i]");
            $im->setImageCompression(Imagick::COMPRESSION_JPEG);
            $im->setImageCompressionQuality(100);
            $im->setImageFormat("jpg");
            $image_out = $filename . "_" . $i . ".jpg";
            $im->writeImage('images/' . $image_out);
        }
    }
}