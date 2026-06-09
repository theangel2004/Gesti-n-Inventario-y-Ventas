@extends('layouts.app')

@section('content')
<main class="flex-grow p-lg overflow-y-auto custom-scrollbar bg-background">
    <div class="grid grid-cols-12 gap-lg max-w-[1440px] mx-auto">
        <section class="col-span-12 lg:col-span-4 flex flex-col gap-lg">
            <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-lg shadow-sm">
                <div class="flex items-center gap-sm mb-lg">
                    <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">assignment</span>
                    <h3 class="font-title-lg text-title-lg text-on-surface">Encabezado del Pedido</h3>
                </div>
                <div class="space-y-md">
                    <div class="space-y-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant px-1">Cliente</label>
                        <div class="relative">
                            <select class="w-full bg-white border border-outline-variant rounded-lg px-md py-sm font-body-md text-on-surface focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all appearance-none cursor-pointer">
                                <option value="">Seleccionar cliente...</option>
                                <option value="1">Comercial del Norte S.A.</option>
                                <option value="2">Distribuidora Central</option>
                                <option value="3">Almacenes Unidos</option>
                            </select>
                            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-outline">expand_more</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-md">
                        <div class="space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant px-1">Fecha</label>
                            <input class="w-full bg-white border border-outline-variant rounded-lg px-md py-sm font-body-md text-on-surface focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all" type="date" value="2023-10-27"/>
                        </div>
                        <div class="space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant px-1">Estado</label>
                            <div class="flex items-center gap-xs bg-secondary-container/30 px-md py-sm rounded-lg border border-secondary-container">
                                <span class="w-2 h-2 bg-secondary rounded-full"></span>
                                <span class="font-label-lg text-label-lg text-on-secondary-container uppercase">Borrador</span>
                            </div>
                        </div>
                    </div>
                    <div class="pt-lg border-t border-outline-variant">
                        <h4 class="font-label-md text-label-md text-on-surface-variant mb-sm">Resumen de Venta</h4>
                        <div class="space-y-sm">
                            <div class="flex justify-between items-center">
                                <span class="font-body-md text-body-md text-on-surface-variant">Subtotal</span>
                                <span class="font-tabular-nums text-tabular-nums text-on-surface">$2,450.00</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-body-md text-body-md text-on-surface-variant">Impuestos (16%)</span>
                                <span class="font-tabular-nums text-tabular-nums text-on-surface">$392.00</span>
                            </div>
                            <div class="flex justify-between items-center pt-sm border-t border-outline-variant">
                                <span class="font-title-md text-title-md text-primary">Total</span>
                                <span class="font-headline-md text-headline-md text-primary">$2,842.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-lg flex flex-col gap-md">
                <button class="w-full py-md px-lg bg-primary text-on-primary rounded-xl font-title-md text-title-md flex items-center justify-center gap-sm hover:brightness-110 active:scale-[0.98] transition-all">
                    <span class="material-symbols-outlined">save</span> Guardar Pedido
                </button>
                <button class="w-full py-md px-lg bg-tertiary-container text-on-tertiary-container border border-on-tertiary-container/20 rounded-xl font-title-md text-title-md flex items-center justify-center gap-sm hover:bg-tertiary transition-all">
                    <span class="material-symbols-outlined">local_shipping</span> Confirmar Despacho
                </button>
                <button class="w-full py-md px-lg text-error hover:bg-error-container/20 rounded-xl font-title-md text-title-md flex items-center justify-center gap-sm transition-all">
                    <span class="material-symbols-outlined">cancel</span> Cancelar
                </button>
            </div>
        </section>

        <section class="col-span-12 lg:col-span-8 flex flex-col gap-lg">
            <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-lg shadow-sm">
                <div class="flex items-center gap-sm mb-lg">
                    <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">add_shopping_cart</span>
                    <h3 class="font-title-lg text-title-lg text-on-surface">Detalle de Productos</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-12 gap-md items-end">
                    <div class="md:col-span-5 space-y-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant px-1">Producto</label>
                        <div class="relative">
                            <select class="w-full bg-white border border-outline-variant rounded-lg px-md py-sm font-body-md text-on-surface focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all appearance-none cursor-pointer" id="productSelect">
                                <option value="">Seleccionar producto...</option>
                                <option data-price="45.00" data-stock="15" value="p1">Aceite Vegetal 1L (Stock: 15)</option>
                                <option data-price="120.00" data-stock="2" value="p2">Detergente Industrial 5kg (Stock: 2)</option>
                                <option data-price="12.50" data-stock="150" value="p3">Pasta de Tomate 200g (Stock: 150)</option>
                            </select>
                            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-outline">inventory</span>
                        </div>
                    </div>
                    <div class="md:col-span-2 space-y-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant px-1">Cantidad</label>
                        <input class="w-full bg-white border border-outline-variant rounded-lg px-md py-sm font-body-md text-on-surface focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all" id="qtyInput" placeholder="0" type="number"/>
                    </div>
                    <div class="md:col-span-2 space-y-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant px-1">P. Unitario</label>
                        <div class="bg-surface-container rounded-lg px-md py-sm font-tabular-nums text-tabular-nums text-on-surface-variant border border-outline-variant">
                            $0.00
                        </div>
                    </div>
                    <div class="md:col-span-3">
                        <button class="w-full h-[42px] bg-primary-container text-on-primary rounded-lg font-title-md text-title-md flex items-center justify-center gap-sm hover:brightness-110 active:scale-[0.98] transition-all" id="addProductBtn">
                            <span class="material-symbols-outlined">add</span> Agregar
                        </button>
                    </div>
                </div>
                <div class="hidden mt-md p-md bg-error-container/30 border border-error-container rounded-lg flex items-start gap-md animate-pulse" id="stockWarning">
                    <span class="material-symbols-outlined text-error" style="font-variation-settings: 'FILL' 1;">warning</span>
                    <div class="flex-grow">
                        <p class="font-title-md text-title-md text-on-error-container">Stock Insuficiente</p>
                        <p class="font-body-md text-body-md text-on-error-container/80">La cantidad solicitada supera las existencias actuales para este producto.</p>
                    </div>
                </div>
            </div>
            <div class="bg-surface-container-lowest border border-outline-variant rounded-xl shadow-sm overflow-hidden flex flex-col">
                <div class="overflow-x-auto custom-scrollbar">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-surface-container-high/50 border-b border-outline-variant">
                                <th class="px-lg py-md font-label-lg text-label-lg text-on-surface-variant">PRODUCTO</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-on-surface-variant text-center">CANTIDAD</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-on-surface-variant text-right">PRECIO UNIT.</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-on-surface-variant text-right">TOTAL</th>
                                <th class="px-lg py-md font-label-lg text-label-lg text-on-surface-variant"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-outline-variant/30">
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="px-lg py-md">
                                    <div class="flex flex-col">
                                        <span class="font-title-md text-title-md text-on-surface">Aceite Vegetal 1L</span>
                                        <span class="font-label-md text-label-md text-outline">SKU-20934</span>
                                    </div>
                                </td>
                                <td class="px-lg py-md text-center font-body-md text-body-md">10</td>
                                <td class="px-lg py-md text-right font-tabular-nums text-tabular-nums">$150.00</td>
                                <td class="px-lg py-md text-right font-title-md text-title-md text-primary">$1,500.00</td>
                                <td class="px-lg py-md text-right">
                                    <button class="p-sm text-outline hover:text-error hover:bg-error-container/20 rounded-full transition-all">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-surface-container-low transition-colors group">
                                <td class="px-lg py-md">
                                    <div class="flex flex-col">
                                        <span class="font-title-md text-title-md text-on-surface">Arroz Premium 10kg</span>
                                        <span class="font-label-md text-label-md text-outline">SKU-11223</span>
                                    </div>
                                </td>
                                <td class="px-lg py-md text-center font-body-md text-body-md">5</td>
                                <td class="px-lg py-md text-right font-tabular-nums text-tabular-nums">$190.00</td>
                                <td class="px-lg py-md text-right font-title-md text-title-md text-primary">$950.00</td>
                                <td class="px-lg py-md text-right">
                                    <button class="p-sm text-outline hover:text-error hover:bg-error-container/20 rounded-full transition-all">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="hidden flex-col items-center justify-center p-xl text-center bg-surface-container-low/30 border-t border-dashed border-outline-variant">
                    <span class="material-symbols-outlined text-outline-variant text-5xl mb-md">shopping_cart_off</span>
                    <p class="font-title-lg text-title-lg text-outline">No hay productos agregados</p>
                    <p class="font-body-md text-body-md text-outline-variant">Agregue productos desde la sección superior para comenzar el pedido.</p>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection

@push('scripts')
<script>
    const productSelect = document.getElementById('productSelect');
    const qtyInput = document.getElementById('qtyInput');
    const addBtn = document.getElementById('addProductBtn');
    const warning = document.getElementById('stockWarning');

    // Validación interactiva de existencias de stock
    qtyInput.addEventListener('input', () => {
        const selectedOption = productSelect.options[productSelect.selectedIndex];
        if (!selectedOption.value) return;

        const stockAvailable = parseInt(selectedOption.getAttribute('data-stock'));
        const qtyRequested = parseInt(qtyInput.value);

        if (qtyRequested > stockAvailable) {
            warning.classList.remove('hidden');
            addBtn.disabled = true;
            addBtn.classList.add('opacity-50', 'cursor-not-allowed');
        } else {
            warning.classList.add('hidden');
            addBtn.disabled = false;
            addBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        }
    });

    productSelect.addEventListener('change', () => {
        qtyInput.dispatchEvent(new Event('input'));
    });
</script>
@endpush