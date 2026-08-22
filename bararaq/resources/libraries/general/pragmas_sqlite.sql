/* ------------------------------------------------------------------------------
*   SQLITE PRAGMAS
*   Mejora el rendimiento de lectura y escritura
*
*   (P) Persistente - (NP) No Persistente
* ---------------------------------------------------------------------------- */


-- El modo Write-Ahead Logging (WAL) mejora mucho la concurrencia y velocidad de escritura. (P)
PRAGMA journal_mode = WAL;


-- Controla cuánto espera SQLite para garantizar que los datos se escriban físicamente en disco. (NP)
-- Control de sincronización (0=OFF, 1=NORMAL, 2=FULL)
-- "OFF" es más rápido pero menos seguro ante cortes de energía
PRAGMA synchronous = NORMAL;


-- Desactiva temporales en disco. (NP)
-- Usa memoria RAM para operaciones temporales
PRAGMA temp_store = MEMORY;


-- Aumenta el tamaño del caché interno (en páginas) ~200 MB de caché. (NP)
PRAGMA cache_size = -200000;


-- Espera hasta 10s si la DB está ocupada. (NP)
PRAGMA busy_timeout = 15000;


-- Opcional: forzar checkpoints automáticos en WAL (mantiene el archivo -wal bajo control)
PRAGMA wal_autocheckpoint = 1000;


-- Evitar verificación de claves foráneas (ligeramente más rápido si no las necesitas)
PRAGMA foreign_keys = OFF;


-- Memory-mapped I/O (256 MB) para lecturas más rápidas
PRAGMA mmap_size = 268435456;
