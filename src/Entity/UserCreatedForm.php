<?php


namespace Ups\Entity;


use DOMDocument;
use DOMNode;
use Ups\NodeInterface;

/**
 * @author Maciej Kotlarz <maciej.kotlarz@pixers.uk>
 * @copyright 2019 PIXERS Ltd
 */
class UserCreatedForm implements NodeInterface
{
    /**
     * @var array
     */
    protected $documentIDs;

    /**
     * @param $documentId
     */
    public function addDocumentID($documentId)
    {
        $this->documentIDs[] = $documentId;
    }

    /**
     * @return array
     */
    public function getDocumentIDs()
    {
        return $this->documentIDs;
    }

    /**
     * @param array $documentIds
     * @return UserCreatedForm
     */
    public function setDocumentIDs(array $documentIds)
    {
        $this->documentIDs = $documentIds;

        return $this;
    }

    /**
     * @param null|DOMDocument $document
     *
     * @return DOMNode
     */
    public function toNode(DOMDocument $document = null)
    {
        if ($document === null)
        {
            $document = new DOMDocument();
        }

        $node = $document->createElement('UserCreatedForm');
        if ($this->getDocumentIDs() !== null)
        {
            foreach ($this->documentIDs as $documentID)
            $node->appendChild($document->createElement('DocumentID', $documentID));
        }

        return $node;
    }
}