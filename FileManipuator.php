<?php

class FileManipulator
{
    public function create($filePath)
    {
        if (file_exists($filePath)) {
            return false;
        }

        $handle = fopen($filePath, 'w+');
        fclose($handle);

        return true;
    }

    public function delete($filePath)
    {
        if (!file_exists($filePath)) {
            return false;
        }

        unlink($filePath);

        return true;
    }

    public function copy($filePath, $copyPath)
    {
        if (!file_exists($filePath)) {
            return false;
        }

        copy($filePath, $copyPath);

        return true;
    }

    public function rename($filePath, $newName)
    {
        if (!file_exists($filePath)) {
            return false;
        }

        $dir = dirname($filePath);
        $renamedPath = $dir . '/' . $newName;

        rename($filePath, $renamedPath);

        return true;
    }

    public function replace($filePath, $newPath)
    {
        if (!file_exists($filePath)) {
            return false;
        }

        rename($filePath, $newPath);

        return true;
    }

    public function weigh($filePath)
    {
        if (!file_exists($filePath)) {
            return false;
        }

        $size = filesize($filePath);

        return $size;
    }
}