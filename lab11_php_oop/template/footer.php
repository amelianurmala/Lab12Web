                </div> <!-- End of main content -->
                
                <!-- Footer -->
                <footer class="glass-footer mt-4 p-3 rounded text-center">
                    <p class="mb-1">
                        <strong>PHP OOP Modular System</strong> - Praktikum Pemrograman Web
                    </p>
                    <p class="mb-0 text-muted small">
                        &copy; <?php echo date('Y'); ?> - Ameia Nurmala Dewi - TI.24.A2
                    </p>
                    <p class="mt-2">
                        <span class="badge bg-secondary">Versi 1.0</span>
                        <span class="badge bg-primary">Modular Architecture</span>
                    </p>
                </footer>
            </div> <!-- End of col-lg-9 -->
        </div> <!-- End of row -->
    </div> <!-- End of container -->
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Efek animasi untuk tombol
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });
                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
            
            // Efek untuk card saat hover
            const cards = document.querySelectorAll('.glass-card, .glass-sidebar');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.boxShadow = '0 12px 40px rgba(0, 0, 0, 0.15)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.boxShadow = '0 8px 32px rgba(0, 0, 0, 0.1)';
                });
            });
        });
    </script>
</body>
</html>