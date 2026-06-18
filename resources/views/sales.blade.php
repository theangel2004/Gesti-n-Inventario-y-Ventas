@extends('layouts.app')

@section('content')
<main class="flex-grow p-sm sm:p-lg overflow-y-auto custom-scrollbar bg-background">
    <div class="max-w-[1440px] mx-auto w-full">
        
        <form action="{{ route('sales.store') }}" method="POST" id="salesForm" class="flex flex-col lg:flex-row gap-lg w-full items-start">
            @csrf

            @if($errors->any() || session('success'))
                <div class="w-full lg:hidden block">
                    @if($errors->any())
                        <div class="bg-error-container/30 border border-error text-on-error-container p-md rounded-xl font-body-md mb-md">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="bg-success-container/30 border border-success text-on-success-container p-md rounded-xl font-body-md mb-md">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            @endif

            <section class="w-full lg:w-1/3 flex flex-col gap-lg sticky top-0">
                
                @if($errors->any() || session('success'))
                    <div class="w-full hidden lg:block">
                        @if($errors->any())
                            <div class="bg-error-container/30 border border-error text-on-error-container p-md rounded-xl font-body-md">
                                {{ $errors->first() }}
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="bg-success-container/30 border border-success text-on-success-container p-md rounded-xl font-body-md">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                @endif

                <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md sm:p-lg shadow-sm w-full">
                    <div class="flex items-center gap-sm mb-lg">
                        <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">assignment</span>
                        <h3 class="font-title-lg text-title-lg text-on-surface">Encabezado del Pedido</h3>
                    </div>
                    
                    <div class="space-y-md">
                        <div class="space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant px-1">Cliente</label>
                            <div class="relative">
                                <select name="cliente_id" required class="w-full bg-white border border-outline-variant rounded-lg px-md py-sm font-body-md text-on-surface focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all appearance-none cursor-pointer">
                                    <option value="">Seleccionar cliente...</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id }}" {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}>
                                            {{ $cliente->nombre_tienda }} ({{ $cliente->nombre_contacto }})
                                        </option>
                                    @endforeach
                                </select>
                                <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-outline">expand_more</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-md">
                            <div class="space-y-xs">
                                <label class="font-label-md text-label-md text-on-surface-variant px-1">Fecha</label>
                                <input name="fecha_venta" class="w-full bg-white border border-outline-variant rounded-lg px-md py-sm font-body-md text-on-surface focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all" type="date" value="{{ date('Y-m-d') }}"/>
                            </div>
                            
                            <div class="space-y-xs">
                                <label class="font-label-md text-label-md text-on-surface-variant px-1">Método Pago</label>
                                <div class="relative">
                                    <select name="metodo_pago" required class="w-full bg-white border border-outline-variant rounded-lg px-md py-sm font-body-md text-on-surface focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all appearance-none cursor-pointer">
                                        <option value="contado">Contado</option>
                                        <option value="credito">Crédito</option>
                                    </select>
                                    <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-outline">expand_more</span>
                                </div>
                            </div>
                        </div>

                        <div class="pt-lg border-t border-outline-variant">
                            <h4 class="font-label-md text-label-md text-on-surface-variant mb-sm">Resumen de Venta</h4>
                            <div class="space-y-sm">
                                <div class="flex justify-between items-center">
                                    <span class="font-body-md text-body-md text-on-surface-variant">Subtotal</span>
                                    <span class="font-tabular-nums text-tabular-nums text-on-surface" id="summarySubtotal">$0.00</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="font-body-md text-body-md text-on-surface-variant">Impuestos (16%)</span>
                                    <span class="font-tabular-nums text-tabular-nums text-on-surface" id="summaryTax">$0.00</span>
                                </div>
                                <div class="flex justify-between items-center pt-sm border-t border-outline-variant">
                                    <span class="font-title-md text-title-md text-primary">Total</span>
                                    <span class="font-headline-md text-headline-md text-primary" id="summaryTotal">$0.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md sm:p-lg flex flex-col sm:flex-row lg:flex-col gap-md w-full">
                    <button type="submit" class="w-full py-md px-lg bg-primary text-on-primary rounded-xl font-title-md text-title-md flex items-center justify-center gap-sm hover:brightness-110 active:scale-[0.98] transition-all">
                        <span class="material-symbols-outlined">save</span> Registrar Venta
                    </button>
                    <a href="{{ route('sales.index') }}" class="w-full py-md px-lg bg-surface border border-outline text-center text-on-surface rounded-xl font-title-md text-title-md flex items-center justify-center gap-sm hover:bg-surface-container transition-all">
                        <span class="material-symbols-outlined">cancel</span> Limpiar
                    </a>
                </div>
            </section>

            <section class="w-full lg:w-2/3 flex flex-col gap-lg">
                <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-md sm:p-lg shadow-sm w-full">
                    <div class="flex items-center gap-sm mb-lg">
                        <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">add_shopping_cart</span>
                        <h3 class="font-title-lg text-title-lg text-on-surface">Detalle de Productos</h3>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-12 gap-md items-end">
                        <div class="sm:col-span-2 md:col-span-5 space-y-xs">
                            <label class="font-label-md text-label-md text-on-surface-variant px-1">Producto</label>
                            <div class="relative">
                                <select class="w-full bg-white border border-outline-variant rounded-lg px-md py-sm font-body-md text-on-surface focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all appearance-none cursor-pointer" id="productSelect">
                                    <option value="">Seleccionar producto...</option>
                                    @foreach($productos as $producto)
                                        <option data-price="{{ $producto->precio_venta }}" data-stock="{{ $producto->stock_actual }}" data-sku="{{ $producto->codigo_barras }}" value="{{ $producto->id }}">
                                            {{ $producto->nombre }} (Stock: {{ $producto->stock_actual }})
                                        </option>
                                    @endforeach
                                </select>
                                <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-outline">inventory</span>
                            </div>
                        </div>

                        <div class="space-y-xs md:col-span-2">
                            <label class="font-label-md text-label-md text-on-surface-variant px-1">Cantidad</label>
                            <input class="w-full bg-white border border-outline-variant rounded-lg px-md py-sm font-body-md text-on-surface focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all" id="qtyInput" min="1" placeholder="0" type="number"/>
                        </div>

                        <div class="space-y-xs md:col-span-2">
                            <label class="font-label-md text-label-md text-on-surface-variant px-1">P. Unitario</label>
                            <div class="bg-surface-container rounded-lg px-md py-sm font-tabular-nums text-tabular-nums text-on-surface-variant border border-outline-variant min-h-[42px] flex items-center" id="unitPriceDisplay">
                                $0.00
                            </div>
                        </div>

                        <div class="sm:col-span-2 md:col-span-3">
                            <button type="button" class="w-full h-[42px] bg-primary text-on-primary rounded-lg font-title-md text-title-md flex items-center justify-center gap-sm hover:brightness-110 active:scale-[0.98] transition-all" id="addProductBtn">
                                <span class="material-symbols-outlined">add</span> Agregar
                            </button>
                        </div>
                    </div>

                    <div class="hidden mt-md p-md bg-error-container/30 border border-error-container rounded-lg flex items-start gap-md" id="stockWarning">
                        <span class="material-symbols-outlined text-error" style="font-variation-settings: 'FILL' 1;">warning</span>
                        <div class="flex-grow">
                            <p class="font-title-md text-title-md text-on-error-container">Stock Insuficiente</p>
                            <p class="font-body-md text-body-md text-on-error-container/80">La cantidad solicitada supera las existencias actuales.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-surface-container-lowest border border-outline-variant rounded-xl shadow-sm overflow-hidden flex flex-col w-full">
                    <div class="overflow-x-auto w-full custom-scrollbar">
                        <table class="w-full text-left border-collapse min-w-[600px]" id="cartTable">
                            <thead>
                                <tr class="bg-surface-container-high/50 border-b border-outline-variant">
                                    <th class="px-lg py-md font-label-lg text-label-lg text-on-surface-variant">PRODUCTO</th>
                                    <th class="px-lg py-md font-label-lg text-label-lg text-on-surface-variant text-center">CANTIDAD</th>
                                    <th class="px-lg py-md font-label-lg text-label-lg text-on-surface-variant text-right">PRECIO UNIT.</th>
                                    <th class="px-lg py-md font-label-lg text-label-lg text-on-surface-variant text-right">TOTAL</th>
                                    <th class="px-lg py-md font-label-lg text-label-lg text-on-surface-variant"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-outline-variant/30" id="cartBody">
                            </tbody>
                        </table>
                    </div>

                    <div class="flex flex-col items-center justify-center p-xl text-center bg-surface-container-low/30 border-t border-dashed border-outline-variant" id="emptyCartMessage">
                        <span class="material-symbols-outlined text-outline-variant text-5xl mb-md">shopping_cart_off</span>
                        <p class="font-title-lg text-title-lg text-outline">No hay productos agregados</p>
                        <p class="font-body-md text-body-md text-outline-variant">Agregue productos desde la sección superior.</p>
                    </div>
                </div>
            </section>
        </form>
    </div>
</main>
@endsection

@push('scripts')
<script>
    const productSelect = document.getElementById('productSelect');
    const qtyInput = document.getElementById('qtyInput');
    const addBtn = document.getElementById('addProductBtn');
    const warning = document.getElementById('stockWarning');
    const unitPriceDisplay = document.getElementById('unitPriceDisplay');
    const cartBody = document.getElementById('cartBody');
    const emptyCartMessage = document.getElementById('emptyCartMessage');

    const summarySubtotal = document.getElementById('summarySubtotal');
    const summaryTax = document.getElementById('summaryTax');
    const summaryTotal = document.getElementById('summaryTotal');

    let cart = [];

    productSelect.addEventListener('change', () => {
        const selectedOption = productSelect.options[productSelect.selectedIndex];
        if (selectedOption.value) {
            const price = parseFloat(selectedOption.getAttribute('data-price'));
            unitPriceDisplay.textContent = `$${price.toFixed(2)}`;
        } else {
            unitPriceDisplay.textContent = "$0.00";
        }
        qtyInput.dispatchEvent(new Event('input'));
    });

    qtyInput.addEventListener('input', () => {
        const selectedOption = productSelect.options[productSelect.selectedIndex];
        if (!selectedOption.value) return;

        const stockAvailable = parseInt(selectedOption.getAttribute('data-stock'));
        const qtyRequested = parseInt(qtyInput.value) || 0;

        if (qtyRequested > stockAvailable || qtyRequested <= 0) {
            warning.classList.remove('hidden');
            addBtn.disabled = true;
            addBtn.classList.add('opacity-50', 'cursor-not-allowed');
        } else {
            warning.classList.add('hidden');
            addBtn.disabled = false;
            addBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        }
    });

    addBtn.addEventListener('click', () => {
        const productId = productSelect.value;
        const selectedOption = productSelect.options[productSelect.selectedIndex];

        if (!productId) {
            alert("Por favor seleccione un producto.");
            return;
        }

        const qty = parseInt(qtyInput.value) || 0;
        if (qty <= 0) {
            alert("Ingrese una cantidad válida.");
            return;
        }

        if (cart.some(item => item.id === productId)) {
            alert("Este producto ya está en el carrito. Elimínelo si desea cambiar la cantidad.");
            return;
        }

        const name = selectedOption.text.split(' (')[0];
        const sku = selectedOption.getAttribute('data-sku') || 'N/A';
        const price = parseFloat(selectedOption.getAttribute('data-price'));

        cart.push({ id: productId, name, sku, qty, price });
        
        productSelect.value = "";
        qtyInput.value = "";
        unitPriceDisplay.textContent = "$0.00";

        renderCart();
    });

    function removeItem(id) {
        cart = cart.filter(item => item.id !== id);
        renderCart();
    }

    function renderCart() {
        cartBody.innerHTML = "";
        let subtotalGeneral = 0;

        if (cart.length === 0) {
            emptyCartMessage.classList.remove('hidden');
        } else {
            emptyCartMessage.classList.add('hidden');
            
            cart.forEach((item, index) => {
                const totalItem = item.qty * item.price;
                subtotalGeneral += totalItem;

                const tr = document.createElement('tr');
                tr.className = "hover:bg-surface-container-low transition-colors group";
                tr.innerHTML = `
                    <td class="px-lg py-md">
                        <input type="hidden" name="productos[${index}][id]" value="${item.id}">
                        <input type="hidden" name="productos[${index}][cantidad]" value="${item.qty}">
                        
                        <div class="flex flex-col">
                            <span class="font-title-md text-title-md text-on-surface">${item.name}</span>
                            <span class="font-label-md text-label-md text-outline">${item.sku}</span>
                        </div>
                    </td>
                    <td class="px-lg py-md text-center font-body-md text-body-md">${item.qty}</td>
                    <td class="px-lg py-md text-right font-tabular-nums text-tabular-nums">$${item.price.toFixed(2)}</td>
                    <td class="px-lg py-md text-right font-title-md text-title-md text-primary">$${totalItem.toFixed(2)}</td>
                    <td class="px-lg py-md text-right">
                        <button type="button" onclick="removeItem('${item.id}')" class="p-sm text-outline hover:text-error hover:bg-error-container/20 rounded-full transition-all">
                            <span class="material-symbols-outlined">delete</span>
                        </button>
                    </td>
                `;
                cartBody.appendChild(tr);
            });
        }

        const tax = subtotalGeneral * 0.16;
        const total = subtotalGeneral + tax;

        summarySubtotal.textContent = `$${subtotalGeneral.toFixed(2)}`;
        summaryTax.textContent = `$${tax.toFixed(2)}`;
        summaryTotal.textContent = `$${total.toFixed(2)}`;
    }
</script>
@endpush