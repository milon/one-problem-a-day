---
extends: _layouts.post
section: content
title: Number of provinces
problemUrl: https://leetcode.com/problems/number-of-provinces/
date: 2022-08-29
categories: [graph]
---

We will iterate over each item in the rows, reach row actually denotes the number of connections one city could have. So, we will run DFS in a given neighbors, and if it is not in the visited set, we count it as new province, and start DFS from that city.

```python
class Solution:
    def findCircleNum(self, isConnected: List[List[int]]) -> int:
        nodes= len(isConnected)
        visited = set()
        
        def dfs(i):
            if i in visited:
                return
            visited.add(i)
            for j in range(nodes):
                if isConnected[i][j] and j not in visited:
                    dfs(j)
        
        provinces = 0
        for i in range(nodes):
            if i not in visited:
                provinces += 1
                dfs(i)
        return provinces
```

Time Complexity: `O(n^2)`
Space Complexity: `O(n)`