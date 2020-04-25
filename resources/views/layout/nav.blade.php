<nav>
  <div class="wrap">
      <div>
          <a href="/">Home</a>
      </div>
      <a href="/infected">
          I'm infected
      </a>
      <form action="/country" method="POST">
          @csrf
          <input name="searchCountry" placeholder="Country" type="text" required="">
      </form>
  </div>
</nav>
