<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
// use App\Http\Controllers\ArtikelController;
// use App\Http\Requests\{ArtikelIndexRequest,ArtikelShowRequest};
// use App\Repositories\Contracts\ArtikelRepositoryInterface;
// use Illuminate\Http\RedirectResponse;
// use Illuminate\Support\Facades\Redirect;
// use Mockery;

use Tests\TestCase;

class ArtikelControllerTest extends TestCase
{
    // protected $productRepoMock;
    // protected $controller;

    // protected function setUp(): void
    // {
    //     parent::setUp();

    //     // 1. Buat tiruan (Mock) dari Interface
    //     $this->productRepoMock = Mockery::mock(ArtikelRepositoryInterface::class);

    //     // 2. Suntikkan Mock tersebut ke dalam Controller
    //     $this->controller = new ArtikelController($this->productRepoMock);
    // }

    public function it_fails_validation_when_input_is_empty()
    {
        $response = $this->post(route('products.store'), []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name', 'price', 'stock']);
    }

    public function it_fails_validation_when_price_is_negative()
    {
        $response = $this->post(route('products.store'), [
            'name' => 'Produk A',
            'price' => -1000, // Rule kita min:0
            'stock' => 10
        ]);

        $response->assertSessionHasErrors(['price']);
    }

    // public function test_store_method_successfully_saves_product_and_redirects()
    // {
    //     // Data input simulasi yang lolos validasi
    //     $dataDummy = [
    //         'name'  => 'Sepatu Running',
    //         'price' => 500000,
    //         'stock' => 10,
    //     ];

    //     // 3. Ekspektasi: Method 'store' pada Repository HARUS dipanggil 1x
    //     // dengan argumen $dataDummy, dan mengembalikan nilai true/objek.
    //     $this->productRepoMock
    //         ->shouldReceive('store')
    //         ->once()
    //         ->with($dataDummy)
    //         ->andReturn(true);

    //     // 4. Buat mock untuk Form Request
    //     $requestMock = Mockery::mock(StoreProductRequest::class);
    //     $requestMock->shouldReceive('validated')->once()->andReturn($dataDummy);

    //     // 5. Jalankan method store pada Controller
    //     $response = $this->controller->store($requestMock);

    //     // 6. Assertions (Pembuktian hasil)
    //     $this->assertInstanceOf(RedirectResponse::class, $response);
    //     $this->assertEquals(route('products.index'), $response->getTargetUrl());

    //     // Memastikan custom message tersimpan di dalam session flash
    //     $this->assertEquals('success', session('alert-type'));
    //     $this->assertEquals('Penyimpanan Berhasil!', session('title'));
    //     $this->assertStringContainsString('Sepatu Running', session('message'));
    // }

    // protected function tearDown(): void
    // {
    //     // Bersihkan Mockery setelah test selesai
    //     Mockery::close();
    //     parent::tearDown();
    // }
}
