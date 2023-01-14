---
extends: _layouts.post
section: content
title: lexicographically smallest equivalent string
problemUrl: https://leetcode.com/problems/lexicographically-smallest-equivalent-string/
date: 2023-01-14
categories: [graph]
---

We will use basic union-find to find the equivalence classes. Then we will create a new string by iterating over the string `A` and replacing each character with the smallest character in its equivalence class.

```python
class Solution:
    def smallestEquivalentString(self, A: str, B: str, S: str) -> str:
        parent = collections.defaultdict(str)

        def find(e):
            root = e
            if e not in parent:
                parent[e] = e
            
            while root != parent[root]:
                root = parent[root]
            return root
        
        def union(a,b):
            root_a,root_b = find(a),find(b)
            parent[root_a] = parent[root_b] = min(root_a, root_b)
        
        for c1,c2 in zip(s1,s2): union(c1,c2)
        return ''.join(parent[find(c)] for c in baseStr)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`