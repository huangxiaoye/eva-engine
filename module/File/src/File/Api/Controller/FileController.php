<?php
namespace File\Api\Controller;

use File\Form,
    Eva\Api,
    Eva\Mvc\Controller\RestfulModuleController,
    Zend\View\Model\JsonModel;

class FileController extends RestfulModuleController
{
    public function restIndexFile()
    {
        $query = $this->getRequest()->getQuery();

        $form = new Form\FileSearchForm();
        $form->bind($query);
        if($form->isValid()){
            $query = $form->getData();
        }

        $itemModel = Api::_()->getModelService('File\Model\File');
        $items = $itemModel->setItemList($query)->getFileList();
        $paginator = $itemModel->getPaginator();

        $this->layout('layout/adminblank');

        return array(
            'form' => $form,
            'items' => $items,
            'query' => $query,
            'paginator' => $paginator,
        );
    }

    public function restPostFile()
    {
        $postData = $this->params()->fromPost();
        $form = new Form\UploadForm();
        $form->bind($postData);

        $itemModel = Api::_()->getModelService('File\Model\File');

        $response = array();
        if ($form->isValid() && $form->getFileTransfer()->isUploaded()) {
            if($form->getFileTransfer()->receive()){
                
                $files = $form->getFileTransfer()->getFileInfo();
                $itemModel->setUploadFiles($files);
                $itemModel->setConfigKey('default')->createFiles();
                $lastFileId = $itemModel->getLastFileId();

                if($lastFileId) {
                    $item = $itemModel->getFile($lastFileId, array(
                        'self' => array(
                            '*',
                            'getUrl()',
                            'getThumb()',
                        ),
                    ));
                    $file = array(
                        'id' => $item['id'],
                        'name' => $item['originalName'],
                        'size' => (int)$fileinfo['fileSize'],
                        'url' => $item['Url'],
                        'thumbnail_url' => $item['Thumb'],
                    );
                    $response = array(
                        $file
                    );
                }
            }
        } else {
        }

        return new JsonModel($response);
    }

}
