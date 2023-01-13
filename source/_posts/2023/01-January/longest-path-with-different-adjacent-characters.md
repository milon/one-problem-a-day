---
extends: _layouts.post
section: content
title: Longest path with different adjacent characters
problemUrl: https://leetcode.com/problems/longest-path-with-different-adjacent-characters/
date: 2023-01-13
categories: [tree]
---

We will create a tree from the edges list. Then we will start DFS from starting node `0`. Then we will calculate the longest path in the subtree of each node. Finally we will return the longest path in the subtree of each node.

```python
class Solution:
    def longestPath(self, parent: List[int], s: str) -> int:
        tree = defaultdict(list)
        for end, start in enumerate(parent):
            tree[start].append(end)
            
        self.res = 1
        
        def dfs(node):
            max1 = max2 = 0
            for nei in tree[node]:
                neiL = dfs(nei)
                if s[nei] != s[node]:
                    if neiL > max1:
                        max2 = max1
                        max1 = neiL
                    elif neiL > max2:
                        max2 = neiL
            self.res = max(self.res, max1+max2+1)
            
            return max1+1
        
        dfs(0)
        return self.res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`