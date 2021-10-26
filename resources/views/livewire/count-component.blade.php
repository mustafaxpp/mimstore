<div>
    {{(session()->has("cart") && count(session()->get("cart"))>0)? count(session()->get("cart")) : ""}}
</div>
