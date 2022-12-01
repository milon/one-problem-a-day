---
extends: _layouts.post
section: content
title: Path sum IV
problemUrl: https://leetcode.com/problems/path-sum-iv/
date: 2022-12-01
categories: [tree]
---

We will convert the given array into a tree using Node objects. Afterwards, for each path from root to leaf, we can add the sum of that path to our answer.

There are two steps, the tree construction, and the traversal.

In the tree construction, we have some depth, position, and value, and we want to know where the new node goes. With some effort, we can see the relevant condition for whether a node should be left or right is pos - 1 < 2**(depth - 2). For example, when depth = 4, the positions are 1, 2, 3, 4, 5, 6, 7, 8, and it's left when pos <= 4.

In the traversal, we perform a depth-first search from root to leaf, keeping track of the current sum along the path we have travelled. Every time we reach a leaf (node.left == null && node.right == null), we have to add that running sum to our answer.

```python
class TreeNode:
    def __init__(self, val):
        self.val = val
        self.left = None
        self.right = None
        
class Solution:
    def pathSum(self, nums: List[int]) -> int:
        self.res = 0
        root = TreeNode(nums[0] % 10)
        
        for num in nums[1:]:
            depth, pos, val = num//100, num//10 % 10, num % 10
            pos -= 1
            cur = root
            for d in range(depth-2, -1, -1):
                if pos < 2**d:
                    cur.left = cur = cur.left or TreeNode(val)
                else:
                    cur.right = cur = cur.right or TreeNode(val)
                
                pos %= 2**d
        
        def dfs(node, running_sum = 0):
            if not node:
                return
            
            running_sum += node.val
            if not node.left and not node.right:
                self.res += running_sum
            else:
                dfs(node.left, running_sum)
                dfs(node.right, running_sum)
        
        dfs(root)
        return self.res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`