---
extends: _layouts.post
section: content
title: Pseudo palindromic paths in a binary tree
problemUrl: https://leetcode.com/problems/pseudo-palindromic-paths-in-a-binary-tree/
date: 2022-09-14
categories: [backtracking, tree]
---

We will start from root and traverse the root with DFS. In the process we will count the occureance of each node's value. Whenever we reach a root node, we will check for pseudo palindrome, if found one we increase the result count, else we remove that item from our count and continue. After the traversal of whole tree, we return our result.

```python
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def pseudoPalindromicPaths (self, root: Optional[TreeNode]) -> int:
        def isPseudoPalindrome(count: dict) -> int:
            odd = 0
            for cnt in count.values():
                if cnt % 2 == 1:
                    odd += 1
                    if odd > 1:
                        return 0
            return 1
        
        self.res = 0
        count = collections.defaultdict(int)
        
        def dfs(root):
            if not root:
                return
            
            if not root.left and not root.right:
                count[root.val] += 1
                self.res += isPseudoPalindrome(count)
                count[root.val] -= 1
                return
            
            count[root.val] += 1
            dfs(root.left)
            dfs(root.right)
            count[root.val] -= 1
        
        dfs(root)
        
        return self.res
```

Time Complexity: `O(n)`, n is the number of nodes <br/>
Space Complexity: `O(h)`, h is the height of the tree