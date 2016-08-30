<?php

namespace Vindi;

class ImportBatch extends Resource
{
    public function endPoint()
    {
        return 'import_batches';
    }

    public function import($filePath, $options)
    {
        $file = new \SplFileObject($filePath);
        $requestParams = $this->buildRequestParams($file, $options);

        return $this->apiRequester->request('POST', $this->url(), $requestParams);
    }

    private function buildRequestParams(\SplFileObject $file, array $options)
    {
        $multipart = [
            [
                'name' =>'batch',
                'contents' => $file,
                'filename' => $file->getFilename()
            ]
        ];

        foreach ($options as $key => $value) {
            $multipart[] = [
                'name'      => $key,
                'contents'  => $value
            ];
        }

        return compact('multipart');
    }
}
