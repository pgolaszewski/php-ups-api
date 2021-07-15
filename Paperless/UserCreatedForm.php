<?php


namespace Ups\Entity\Paperless;

/**
 * @author Maciej Kotlarz <maciej.kotlarz@pixers.uk>
 * @copyright 2019 PIXERS Ltd
 */
class UserCreatedForm
{
    const FILE_FORMAT_BMP = 'bmp';
    const FILE_FORMAT_DOC = 'doc';
    const FILE_FORMAT_DOCX = 'docx';
    const FILE_FORMAT_GIF = 'gif';
    const FILE_FORMAT_JPG = 'jpg';
    const FILE_FORMAT_PDF = 'pdf';
    const FILE_FORMAT_PNG = 'png';
    const FILE_FORMAT_RTF = 'rtf';
    const FILE_FORMAT_TIF = 'tif';
    const FILE_FORMAT_TXT = 'txt';
    const FILE_FORMAT_XLS = 'xls';
    const FILE_FORMAT_XLSX = 'xlsx';

    const DOCUMENT_TYPE_AUTHORIZATION_FORM = '001';
    const DOCUMENT_TYPE_COMMERCIAL_INVOICE = '002';
    const DOCUMENT_TYPE_CERTIFICATE_OF_ORIGIN = '003';
    const DOCUMENT_TYPE_EXPORT_ACCOMPANYING_DOCUMENT = '004';
    const DOCUMENT_TYPE_EXPORT_LICENSE = '005';
    const DOCUMENT_TYPE_IMPORT_PERMIT = '006';
    const DOCUMENT_TYPE_ONE_TIME_NAFTA = '007';
    const DOCUMENT_TYPE_OTHER_DOCUMENT = '008';
    const DOCUMENT_TYPE_POWER_OF_ATTORNEY = '009';
    const DOCUMENT_TYPE_PACKAGING_LIST = '010';
    const DOCUMENT_TYPE_SED_DOCUMENT = '011';
    const DOCUMENT_TYPE_SHIPPERS_LETTER_OF_INSTRUCTION = '012';
    const DOCUMENT_TYPE_DECLARATION = '013';

    protected string $userCreatedFormFileName;

    protected string $userCreatedFormFile;

    protected string $userCreatedFormFileFormat;

    protected string $userCreatedFormDocumentType;

    /**
     * @return mixed
     */
    public function getUserCreatedFormFileName()
    {
        return $this->userCreatedFormFileName;
    }

    /**
     * @param mixed $userCreatedFormFileName
     */
    public function setUserCreatedFormFileName($userCreatedFormFileName)
    {
        $this->userCreatedFormFileName = $userCreatedFormFileName;
    }

    /**
     * @return mixed
     */
    public function getUserCreatedFormFile()
    {
        return $this->userCreatedFormFile;
    }

    /**
     * @param mixed $userCreatedFormFile
     */
    public function setUserCreatedFormFile($userCreatedFormFile)
    {
        $this->userCreatedFormFile = $userCreatedFormFile;
    }

    /**
     * @return mixed
     */
    public function getUserCreatedFormFileFormat()
    {
        return $this->userCreatedFormFileFormat;
    }

    /**
     * @param mixed $userCreatedFormFileFormat
     */
    public function setUserCreatedFormFileFormat($userCreatedFormFileFormat)
    {
        $this->userCreatedFormFileFormat = $userCreatedFormFileFormat;
    }

    /**
     * @return mixed
     */
    public function getUserCreatedFormDocumentType()
    {
        return $this->userCreatedFormDocumentType;
    }

    /**
     * @param mixed $userCreatedFormDocumentType
     */
    public function setUserCreatedFormDocumentType($userCreatedFormDocumentType)
    {
        $this->userCreatedFormDocumentType = $userCreatedFormDocumentType;
    }
}
