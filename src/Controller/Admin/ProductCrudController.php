<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
//use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\{TextField, TextEditorField, NumberField, IntegerField, AssociationField, FormField, ImageField, Field};
use Vich\UploaderBundle\Form\Type\VichImageType;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
//        return parent::configureCrud($crud); // TODO: Change the autogenerated stub

        return $crud
            ->setEntityLabelInPlural('Products')
            ->setPageTitle('index', '%entity_label_plural% listing')

            ->setSearchFields(['name', 'description', 'category.name', 'brand.name'])
            ->setDefaultSort(['id'=>'DESC', 'name'=>'ASC', 'createdAt'=>'DESC'])
            ->setPaginatorPageSize(3);

            ;
    }


    public function configureFilters(Filters $filters): Filters
    {
//        return parent::configureFilters($filters); // TODO: Change the autogenerated stub

        return  $filters
            ->add('name')
            ->add('price')
            ->add('category')
            ->add('brand');
    }

    public function configureAssets(Assets $assets): Assets
    {
//        return parent::configureAssets($assets); // TODO: Change the autogenerated stub

        return  $assets
            ->addHtmlContentToBody('<script>
                const pif = document.getElementById("Product_imageFile_file");

function reader(){
    let img = document.createElement("img");
    
    if (pif.files && pif.files[0]){
        let read = new FileReader();
        read.onload = function(e){
            img.setAttribute("src", e.target.result);
            document.querySelector(".ea-vich-image").prepend(img);
        }
        read.readAsDataURL(pif.files[0]);
    }
}

if(document.getElementById("Product_imageFile_file")){
    console.log("pif");
    document.getElementById("Product_imageFile_file").addEventListener("change", ()=>reader());
}

            </script>');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            TextField::new('name'),
            NumberField::new('price'),
            IntegerField::new('stock_quantity'),

            TextEditorField::new('description'),

            FormField::addPanel("Brands"),
            AssociationField::new('brand')
            ->setRequired(true)
            ->setHelp("Choise brand"),

            FormField::addPanel("Categories"),
            AssociationField::new('category')
                ->setRequired(true)
                ->setHelp("Choise category"),

            ImageField::new('image_name')->setBasePath($this->getParameter('app.path.product_images'))->onlyOnIndex(),

            Field::new('imageFile')->SetFormType(VichImageType::class)->onlyOnForms()

        ];
    }
}
