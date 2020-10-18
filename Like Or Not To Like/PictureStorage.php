<?php


class PictureStorage
{
    private $resource;

    private array $pictures;

    public function __construct()
    {
        $this->resource = fopen('Images/imagelist.csv', 'rwb+');

        $this->loadPictureNames();

        fclose($this->resource);
    }

    public function loadPictureNames(): void
    {
        while (!feof($this->resource)) {
            $data = fgetcsv($this->resource);

            if (!empty($data)) {
                $this->pictures[] = new Picture(
                    (string)$data[0],
                    (int)$data[1]
                );
            }
        }
    }

    public function getAllPics(): array
    {
        return $this->pictures;
    }

    public function changeLikes($number, $pictureName): void
    {
        $this->resource = fopen('./Images/imagelist.csv', 'rwb+');

        $row = 0;
        $tmp = "";

        while (($line = fgets($this->resource)) !== false) {
            $pictureArray = explode(',', $line);
            if ($pictureName === $pictureArray[0]) {
                $pictureArray[1] += $number;
                $tmp = $pictureArray[1];
                break;
            }
            $row++;
        }

        fclose($this->resource);

        $fileOut = file('./Images/imagelist.csv');
        echo 'row is ' . $row;
        $fileOut[$row] = $pictureName . ',' . $tmp . PHP_EOL;
        file_put_contents('./Images/imagelist.csv', implode('', $fileOut));
    }
}