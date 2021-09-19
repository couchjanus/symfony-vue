<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Mapping\Annotation as Gedmo;
use App\Controller\Api\GetProductBySlug;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @ORM\HasLifecycleCallbacks
 * @Vich\Uploadable
 *  @ApiResource(
 *   normalizationContext={"groups" = {"product"}},
 *   itemOperations={
 *     "get",
 *     "get_by_slug" = {
 *       "method" = "GET",
 *       "path" = "/products/{slug}",
 *       "controller" = ProductBySlugController::class,
 *       "read"=false,
 *       "openapi_context" = {
 *         "parameters" = {
 *           {
 *             "name" = "slug",
 *             "in" = "path",
 *             "description" = "The slug of your product",
 *             "type" = "string",
 *             "required" = true,
 *             "example"= "Black_Cat_10_09_2021_08_47_36",
 *           },
 *         },
 *       },
 *     },
 *     }
 * )
 */

class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @ApiProperty(identifier=false)
     * @Groups({"product"})
     */
    private  ?int $id = null;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"product"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"product"})
     */
    private $imageName;

    /**
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTimeInterface|null
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTimeInterface|null
     */
    private $createdAt;

//    public function __construct(){
//        $this->createdAt = new \DateTime();
//    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps():void
    {
        $this->setUpdatedAt(new \DateTime());
        if ($this->getCreatedAt()===null){
            $this->setCreatedAt(new \DateTime());
        }
    }

    public function setCreatedAt(?\DateTimeInterface $created){
        $this->createdAt = $created;
    }
    public function setUpdatedAt(?\DateTimeInterface $updated){
        $this->updatedAt = $updated;
    }

    public function getCreatedAt():?\DateTimeInterface{
        return $this->createdAt;
    }
    public function getUpdatedAt():?\DateTimeInterface{
        return $this->updatedAt;
    }
    /**
     * @ORM\Column(type="string", length=128, unique=true)
     * @Gedmo\Slug(fields={"name", "createdAt"}, style="camel", separator="_", updatable=false, unique=false, dateFormat="d/m/Y H-i-s")
     * @ApiProperty(identifier=true)
     * @Groups({"product"})
     */
    private $slug;

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /* @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile  */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;
        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }



    /**
     * @ORM\Column(type="text")
     * @Groups({"product"})
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     * @Groups({"product"})
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"product"})
     */
    private $stock_quantity;

    /**
     * @ORM\ManyToOne(targetEntity=Brand::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"product"})
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"product"})
     */
    private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStockQuantity(): ?int
    {
        return $this->stock_quantity;
    }

    public function setStockQuantity(int $stock_quantity): self
    {
        $this->stock_quantity = $stock_quantity;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
