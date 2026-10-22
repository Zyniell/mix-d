# Synchronization Rule: AGENTS.md

Whenever any modification, addition, deletion, or refactoring is performed on the codebase:
1. **Immediate Update**: You MUST update [AGENTS.md](file:///c:/laragon/www/mix-d/AGENTS.md) in the very same turn/response.
2. **Coverage**:
   - New or modified routes in `application/config/routes.php`.
   - New or modified controllers in `application/controllers/` or `application/controllers/admin/`.
   - New or modified database tables, columns, indexes, or seed queries in `database.sql`.
   - New or modified models in `application/models/`.
   - New or modified libraries, helpers, or core classes in `application/libraries/`, `application/helpers/`, or `application/core/`.
   - Any configuration adjustments in `application/config/`.
3. **No Stale Information**: Ensure that no obsolete descriptions (e.g. initial boilerplate notes) remain in `AGENTS.md`.
